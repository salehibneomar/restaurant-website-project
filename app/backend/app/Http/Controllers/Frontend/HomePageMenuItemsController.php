<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\ApiResponserController;
use App\Models\Menu;
use App\Models\MenuType;

class HomePageMenuItemsController extends ApiResponserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $type_id)
    {
        MenuType::where('id', $type_id)
                  ->where('slug', $type)
                  ->where('status',1)
                  ->firstOrFail();

        $items = Menu::where('type_id', $type_id)->orderBy('id')->get();
        return $this->showAllResponse($items);
    }

    public function show($id){
        $item = Menu::with('type')
                    ->where('status',1)
                    ->where('id', $id)
                    ->firstOrFail();
        return $this->showSingleResponse($item);
    }

}
