<?php

use App\Models\SiteInformation;

function getSiteInfo(){
    $siteInfo = SiteInformation::select('name', 'icon', 'banner')
                                ->first();
    return $siteInfo;
}