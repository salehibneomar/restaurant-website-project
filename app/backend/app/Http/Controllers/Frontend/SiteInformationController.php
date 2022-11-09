<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\ApiResponserController;
use App\Models\SiteInformation;

class SiteInformationController extends ApiResponserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = SiteInformation::firstOrfail();
        return $this->showSingleResponse($informations);
    }

}
