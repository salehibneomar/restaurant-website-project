<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteInformation extends Model
{
    use HasFactory, SoftDeletes;

    const BANNER_DIR  = 'images/banner/';
    const ICON_DIR    = 'images/icon/';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'about',
        'address',
        'icon',
        'banner'
    ];

    protected $appends = [
        'banner_url',
        'icon_url',
    ];

    protected $hidden = [
        'banner', 
        'icon', 
        'id', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getBannerUrlAttribute(){
        $bannerUrl = url($this->attributes['banner']);
        return $bannerUrl;
    }

    public function getIconUrlAttribute(){
        $iconUrl = url($this->attributes['icon']);
        return $iconUrl;
    }
}
