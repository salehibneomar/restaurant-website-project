<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    const ITEM_IMAGE_DIR = 'images/menu_items/';

    protected $fillable = [
        'name',
        'image',
        'price',
        'ingredients',
        'description',
        'status',
        'type_id',
        'user_id',
        'updated_by',
    ];

    protected $hidden = [
        'image',
        'ingredients',
        'description',
        'status',
        'type_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'updated_by',
    ];

    protected $appends = ['image_url'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function type(){
        return $this->belongsTo(MenuType::class, 'type_id', 'id');
    }

    public function getImageUrlAttribute(){
        $imageUrl = url($this->attributes['image']);
        return $imageUrl;
    }

}
