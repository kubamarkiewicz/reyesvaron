<?php namespace KubaMarkiewicz\News\Api;

use Illuminate\Routing\Controller;
use Input;
use KubaMarkiewicz\News\Models\News as ModelNews;
use RainLab\Translate\Classes\Translator;

class News extends Controller
{

    public function index()
    {
        // Translator::instance()->setLocale($locale);

        $query = ModelNews::with('image')
        		->where('published', '1')
        		->orderBy('date', 'desc');

        $result = $query->get(); 

        $return = [];

        if ($result) foreach ($result as $item) {
        	if ($item->image) {
        		$item->thumb = $item->image->getThumb(300,600);
        	}
        	$return[] = $item;
        }

        return response()->json($return, 200, array(), JSON_PRETTY_PRINT);
    }

}