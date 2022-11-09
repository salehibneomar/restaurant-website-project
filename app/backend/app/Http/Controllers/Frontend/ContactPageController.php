<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\ApiResponserController;
use App\Models\SocialMedia;

class ContactPageController extends ApiResponserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialMedia::select('platform', 'icon', 'url')->get();
        return $this->showAllResponse($socials);
    }

}
