<?php

namespace App\Http\Controllers;

use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = SiteInformation::first();
        return view('backend.site.read_information', compact('informations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $informations = SiteInformation::first();
        return view('backend.site.edit_information', compact('informations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:200',
            'email' => 'required|email',
            'phone' => 'required',
            'about' => 'required',
            'address' => 'required'
        ]);

        $informations = SiteInformation::first();

        $informations->update($request->all());

        if($informations->wasChanged()){
            return redirect()
            ->route('siteinformation.read')
            ->with(['type'=>'success', 'msg'=>'Updated!']);
        }

        return redirect()
                ->route('siteinformation.read')
                ->with(['type'=>'info', 'msg'=>'No Change!']);
    }


    public function banner(){
        $banner = SiteInformation::first()->banner;
        return view('backend.site.banner', compact('banner'));
    }

    public function bannerUpdate(Request $request){
        $validated = $request->validate([
            'banner' => 'required|image|mimes:jpg,jpeg|max:5121'
        ],
        [
            'banner.max' => 'Image size should not be larger than 5 Mb'
        ]);

        $informations = SiteInformation::first();

        if(file_exists($informations->banner)){
            unlink($informations->banner);
        }

        $imageFile = $request->file('banner');
        $imageName = "banner.". $imageFile->getClientOriginalExtension();

        Image::make($imageFile)
                ->resize(1200,1200, function($constraint){
                    $constraint->upsize();
                })->save(SiteInformation::BANNER_DIR.$imageName);

        $informations->banner = SiteInformation::BANNER_DIR.$imageName;
        $informations->save();

        return back()->with(['type'=>'success', 'msg'=>'Updated!']);
    }

    public function icon(){
        $icon = SiteInformation::first()->icon;
        return view('backend.site.icon', compact('icon'));
    }

    public function iconUpdate(Request $request){
        $validated = $request->validate([
            'icon' => 'required|image|mimes:png|max:128'
        ],
        [
            'icon.max' => 'Image size should not be larger than 128 Kb'
        ]);

        
        $informations = SiteInformation::first();

        if(file_exists($informations->icon)){
            unlink($informations->icon);
        }

        $imageFile = $request->file('icon');
        $imageName = 'icon.'.$imageFile->getClientOriginalExtension();

        Image::make($imageFile)
                ->resize(60,60, function($constraint){
                    $constraint->upsize();
                })->save(SiteInformation::ICON_DIR.$imageName);
       
        $informations->icon = SiteInformation::ICON_DIR.$imageName;
        $informations->save();

        return back()->with(['type'=>'success', 'msg'=>'Updated!']);

    }
}
