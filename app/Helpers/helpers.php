<?php

if (!function_exists('settings')){
    function settings($key, $local = null){
        $setting = \App\Setting::where('key',$key)->first();
        if ($setting){
            if ($setting->type == 'image'){
                return @$setting->image->url?(str_contains(@$setting->image->url, 'settings')?'/storage/'.@$setting->image->url:@$setting->image->url):asset('assets/site/images/default.png');
            }else{
                if ($local == 'en'){
                    return $setting->value_en;
                }elseif ($local == 'ar'){
                    return $setting->value_ar;
                }else{
                    return $setting->value_en??$setting->value_ar;
                }
            }
        }else{
            return null;
        }

    }
}

