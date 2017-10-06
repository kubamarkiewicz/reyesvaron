<?php namespace KubaMarkiewicz\Neotecman;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }



    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Settings',
                'description' => 'Manage custom settings.',
                'category'    => 'Neotecman Settings',
                'icon'        => 'icon-cog',
                'class'       => 'KubaMarkiewicz\Neotecman\Models\Settings',
                'order'       => 0,
                'keywords'    => 'security location'
            ]
        ];
    }
}
