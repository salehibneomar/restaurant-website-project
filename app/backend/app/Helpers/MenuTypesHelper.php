<?php

use App\Models\MenuType;

function getMenuTypes(){
    $types = MenuType::select('name','slug')
                ->withoutTrashed()
                ->where('status', 1)
                ->get();
                
    return $types;
}