<?php


namespace App;


use Illuminate\Support\Facades\App;

class Setting
{
    public static function getInformation()
    {
        return [
            'name' => __('setting.site_name'),
            'sentence' => __('setting.site_sentence'),
            'service' => __('site.support_sentence'),
            'phone' => '010125489799',
            'address' => __('setting.site_address'),
            'email' => 'example@example.com',
            'website' => 'cesar.com',
            'text' => __('setting.site_text'),
            'facebook_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
        ];
    }


}
