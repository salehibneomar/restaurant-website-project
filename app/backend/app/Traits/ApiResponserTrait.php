<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponserTrait{
    protected function successResponse($data, $code=200){
        return response()->json($data, $code);
    }

    protected function showAllResponse(Collection $collection, $code=200){
        return $this->successResponse($collection, $code);
    }

    protected function showSingleResponse(Model $model, $code=200){
        return $this->successResponse($model, $code);
    }

    protected function errorResponse($error, $code){
        return response()->json(['error'=>$error, 'code'=>$code], $code);
    }
}