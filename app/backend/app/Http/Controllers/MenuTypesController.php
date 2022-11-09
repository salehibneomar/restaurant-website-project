<?php

namespace App\Http\Controllers;

use App\Models\MenuType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = MenuType::all();
        return view('backend.menu_types.read', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
        ]);

        $type = new MenuType();
        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->save();

        return redirect()
        ->route('menu.types.read')
        ->with(['type'=>'success', 'msg'=>'Created!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = MenuType::findOrFail($id);
        return view('backend.menu_types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = MenuType::findOrFail($id);

        $validated = $request->validate([
            'name' => 'min:3|max:100',
            'status' => 'integer|between:0,1'
        ]);

        $type->name = $request->name;
        $type->status = $request->has('status') ? 1 : 0;
        $type->save();

        if($type->wasChanged()){
            return redirect()
            ->route('menu.types.read')
            ->with(['type'=>'success', 'msg'=>'Updated!']);
        }

        return redirect()
                ->route('menu.types.read')
                ->with(['type'=>'info', 'msg'=>'No Change!']);
        
    }

}
