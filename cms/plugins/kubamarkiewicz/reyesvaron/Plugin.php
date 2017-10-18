<?php namespace KubaMarkiewicz\Reyesvaron;

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
                'category'    => 'Reyesvaron Settings',
                'icon'        => 'icon-cog',
                'class'       => 'KubaMarkiewicz\Reyesvaron\Models\Settings',
                'order'       => 0,
                'keywords'    => 'security location'
            ]
        ];
    }
}
