<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{

    private function menuExists($type){
        $menuType = MenuType::where('slug', $type)
                        ->where('status', 1)
                        ->withoutTrashed()
                        ->firstOrfail();
        
        return $menuType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {
        $menuType = $this->menuExists($type);
        $menus = Menu::with('type')
                        ->where('type_id', $menuType->id)
                        ->orderBy('id', 'desc')
                        ->get();
        
        if($request->ajax()){
            $data = DataTables::of($menus)
                    ->editColumn('image', function($menu){
                        $image = '<img class="img tbl-img" src="'.asset($menu->image).'" />';
                        return $image;
                    })
             ->editColumn('price', '{{number_format($price,2)}}')
             ->editColumn('status', function($menu){
                $status= "Instock";
                $alert="success";
                if($menu->status==0){
                    $status='Unavailable';
                    $alert ="danger";
                }
                $alert = '<span class="badge badge-pill badge-'.$alert.'">'.$status.'</span>';
                return $alert;
            })
            ->addColumn('action', function($menu){
                $action = '<div class="float-right dropdown d-inline-block widget-dropdown">
                <button class="dropdown-toggle icon-burger-mini" role="button" id="id_'.$menu->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></button>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="id_'.$menu->id.'">
                  <li class="dropdown-item">
                    <a href="'.route('menu.show', 
                    ['type'=>$menu->type->slug, 'id'=>$menu->id]).'" class="view-btn">View</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="'.route('menu.edit', 
                    ['type'=>$menu->type->slug, 'id'=>$menu->id]).'">Edit</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dlt-btn" href="'.route('menu.destroy', 
                    ['type'=>$menu->type->slug, 'id'=>$menu->id]).'">
                    Delete
                    </a>
                  </li>
                </ul>
              </div>';
              
              return $action;
            }) 
            // ->addIndexColumn()
            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
           
            return $data;
        }
                      
        return view('backend.menu.read', compact('menuType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $menuType = $this->menuExists($type);
        return view('backend.menu.create', compact('menuType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        $menuType = $this->menuExists($type);
        $validated = $request->validate([
            'name'  => 'required|min:3|max:250',
            'price' => 'required|numeric|min:1',
            'ingredients' => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:5121'
            ],
            [
            'image.max' => 'Image size should not be larger than 5 Mb'
            ]);

            $menu = new Menu();
            
            $menu->fill(
                $request->only(
                'name', 
                'price', 
                'ingredients', 
                'description'),
            );

            $menu->type_id = $menuType->id;
            $menu->user_id = Auth::user()->id;

            $imageFile = $request->file('image');
            $imageName = 'menuitem_'.Str::random(32).'_dt_'.date('Ymd_his').'.'.$imageFile->getClientOriginalExtension();

            Image::make($imageFile)->resize(250,250, 
            function($constraint){
                $constraint->upsize();
            })->save(Menu::ITEM_IMAGE_DIR.$imageName);

            $menu->image = Menu::ITEM_IMAGE_DIR.$imageName;
            $menu->save();

            return redirect()
            ->route('menu.read', ['type'=>$menuType->slug])
            ->with(['type'=>'success', 'msg'=>'Created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
        $menuType = $this->menuExists($type);
        $menu = Menu::join('users', 'users.id', '='  ,'menus.updated_by')
                    ->select('menus.*', 'users.name AS updater')
                    ->where('menus.id', $id)
                    ->where('menus.type_id',$menuType->id)
                    ->firstOrFail();

        return view('backend.menu.view', compact('menu'));            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id)
    {
        $menuType = $this->menuExists($type);
        $menu = Menu::where('id', $id)
                    ->where('type_id',$menuType->id)
                    ->firstOrFail();
        
        return view('backend.menu.edit', compact('menu'));             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {
        $menuType = $this->menuExists($type);
        $menu = Menu::where('id', $id)
                    ->where('type_id',$menuType->id)
                    ->firstOrFail();
        
        $validated = $request->validate([
            'name'  => 'required|min:3|max:250',
            'price' => 'required|numeric|min:1',
            'ingredients' => 'required',
            'image'       => 'image|mimes:jpg,jpeg,png|max:5121',
            'status' => 'required|integer|between:0,1'
            ],
            [
            'image.max' => 'Image size should not be larger than 5 Mb'
            ]);
            
            if($request->hasFile('image')){
                $imageFile = $request->file('image');
                $imageName = 'menuitem_'.Str::random(32).'_dt_'.date('Ymd_his').'.'.$imageFile->getClientOriginalExtension();

                if(file_exists($menu->image)){
                    unlink($menu->image);
                }

                Image::make($imageFile)->resize(250,250, 
                function($constraint){
                    $constraint->upsize();
                })->save(Menu::ITEM_IMAGE_DIR.$imageName);
    
                $menu->image = Menu::ITEM_IMAGE_DIR.$imageName;
            }

            $menu->fill(
                $request->only(
                'name', 
                'price', 
                'ingredients', 
                'description',
                'status'),
            );

            if($menu->isDirty()){
                $menu->updated_by = Auth::user()->id;
            }

            $menu->save();

            if($menu->wasChanged()){
                return redirect()
                ->route('menu.read', ['type'=>$menuType->slug])
                ->with(['type'=>'success', 'msg'=>'Updated!']);
            }

            return redirect()
            ->route('menu.read', ['type'=>$menuType->slug])
            ->with(['type'=>'info', 'msg'=>'No change!']);
                    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        $menuType = $this->menuExists($type);
        $menu = Menu::where('id', $id)
                    ->where('type_id',$menuType->id)
                    ->firstOrFail();

        if(file_exists($menu->image)){
            unlink($menu->image);
        }
        $menu->forceDelete();

        return redirect()
        ->route('menu.read', ['type'=>$menuType->slug])
        ->with(['type'=>'success', 'msg'=>'Deleted!']);
    }
}
