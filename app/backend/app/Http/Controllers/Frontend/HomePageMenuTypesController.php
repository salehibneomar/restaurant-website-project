<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\ApiResponserController;
use App\Models\MenuType;

class HomePageMenuTypesController extends ApiResponserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = MenuType::select('id','name', 'slug')
                        ->where('status', 1)
                        ->get();
                        
        return $this->showAllResponse($types);
    }

    
}
