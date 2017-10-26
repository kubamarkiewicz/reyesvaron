<?php namespace KubaMarkiewicz\Recetas\Api;

use Illuminate\Routing\Controller;
use Input;
use KubaMarkiewicz\Recetas\Models\Receta;
use RainLab\Translate\Classes\Translator;

class Recetas extends Controller
{

    public function index()
    {
        // Translator::instance()->setLocale($locale);

        $query = Receta::with('image')
        		->where('published', '1')
        		->orderBy('sort_order', 'asc');

        $result = $query->get(); 

        $return = [];

        if ($result) foreach ($result as $item) {
        	if ($item->image) {
        		$item->image_url = $item->image->getThumb(500,700);
        	}
        	$return[] = $item;
        }

        return response()->json($return, 200, array(), JSON_PRETTY_PRINT);
    }

}