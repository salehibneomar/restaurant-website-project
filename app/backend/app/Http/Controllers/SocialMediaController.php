<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    private $platforms = [
        'Facebook' => '<i class="fa-brands fa-facebook"></i>',
        'Twitter' => '<i class="fa-brands fa-twitter"></i>',
        'Instagram' => '<i class="fa-brands fa-instagram"></i>',
        'WhatsApp' => '<i class="fa-brands fa-whatsapp"></i>'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = SocialMedia::all();
        return view('backend.socialmedia.read', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platforms = $this->platforms;
        return view('backend.socialmedia.create', compact('platforms'));
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
            'platform' => 'required',
            'url' => 'required',
        ]);


        $socialMedia = new SocialMedia();
        
        $socialMedia->platform = $request->platform;
        $socialMedia->url = $request->url;
        $socialMedia->icon = $this->platforms[$request->platform];
        $socialMedia->save();

        return redirect()
            ->route('socialmedia.read')
            ->with(['type'=>'success', 'msg'=>'Created!']);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = SocialMedia::findOrFail($id);
        $media->delete();
        
        return redirect()
            ->route('socialmedia.read')
            ->with(['type'=>'success', 'msg'=>'Deleted!']);
    }
}
