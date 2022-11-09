<?php

namespace App\Models;

use App\Scopes\EditorScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected static function booted(){
        static::addGlobalScope(new EditorScope());
    }
}
