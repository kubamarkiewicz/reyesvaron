<?php namespace KubaMarkiewicz\Pages\Api;

use Illuminate\Routing\Controller;
use KubaMarkiewicz\Pages\Models\Page;

class Pages extends Controller
{

    public function index($locale = 'es')
    {
        // Translator::instance()->setLocale($locale);

        $query = Page::where('published', '1')
                ->orderBy('sort_order', 'asc');

        $result = $query->get(); 

        $return = [];

        if ($result) foreach ($result as $item) {
            $return[$item->slug] = $item;
        }

        return response()->json($return, 200, array(), JSON_PRETTY_PRINT);
    }


}