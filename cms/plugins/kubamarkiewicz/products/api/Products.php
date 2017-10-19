<?php namespace KubaMarkiewicz\Products\Api;

use Illuminate\Routing\Controller;
use Input;
use KubaMarkiewicz\Products\Models\Product;
use RainLab\Translate\Classes\Translator;

class Products extends Controller
{

    public function index()
    {
        $imagesHeight = 420;
        $imageOptions = [
            'quality' => 95,
            'extension' => 'jpg'
        ];

        // Translator::instance()->setLocale($locale);

        $query = Product::with(['image', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8', 'image_9', 'image_10'])
        		->orderBy('sort_order', 'asc');

        $result = $query->get(); 

        $return = [];

        if ($result) foreach ($result as $item) {
            $item->image_url = $item->image ? $item->image->getThumb(null,280, $imageOptions) : null;
            $item->image_url_1 = $item->image_1 ? $item->image_1->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_2 = $item->image_2 ? $item->image_2->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_3 = $item->image_3 ? $item->image_3->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_4 = $item->image_4 ? $item->image_4->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_5 = $item->image_5 ? $item->image_5->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_6 = $item->image_6 ? $item->image_6->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_7 = $item->image_7 ? $item->image_7->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_8 = $item->image_8 ? $item->image_8->getThumb(null,$imagesHeight, $imageOptions) : null;
            $item->image_url_9 = $item->image_9 ? $item->image_9->getThumb(null,$imagesHeight, $imageOptions) : null;
        	$item->image_url_10 = $item->image_10 ? $item->image_10->getThumb(null,$imagesHeight, $imageOptions) : null;
        	$return[] = $item;
        }

        return response()->json($return, 200, array(), JSON_PRETTY_PRINT);
    }

}