<?php namespace KubaMarkiewicz\Pages\Api;

use Illuminate\Routing\Controller;
use RainLab\Pages\Classes\Router;
use Cms\Classes\Theme;
use RainLab\Translate\Classes\Translator;
use RainLab\Pages\Classes\Page;

class Pages extends Controller
{

    public function index($locale = 'es')
    {
        $slugs = ['/', 'products', 'menu', 'footer'];

        // Translator::instance()->setLocale($locale);

        $router = new Router(Theme::getActiveTheme());

        $return = [];
        $pages = Page::listInTheme(Theme::getActiveTheme());
        // dump($pages);

        foreach ($pages as $page) {
            $slug = str_replace('/', '', $page->viewBag['url']);
            $return[$slug] = $page->viewBag;
        }
        
        return response()->json($return, 200, array(), JSON_PRETTY_PRINT);
    }


}