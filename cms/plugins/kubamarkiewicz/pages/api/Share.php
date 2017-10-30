<?php namespace KubaMarkiewicz\Pages\Api;

use Illuminate\Routing\Controller;
use KubaMarkiewicz\Pages\Models\Page;

class Share extends Controller
{

    public function index()
    {

        // print_r($_SERVER);

        $pageUrl = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

        $parts = explode('/', $_SERVER['REQUEST_URI']);
        $slug = end($parts);

        $query = Page::where('slug', $slug);

        $page = $query->first(); 

        if ($page) : ?>

<!doctype html>
<html>
<head>
    <title><?=$page->meta_title?></title>
    <meta name="description" content="<?=$page->description?>">
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="<?=$pageUrl?>">
    <meta property="og:type"          content="website">
    <meta property="og:title"         content="<?=$page->meta_title?>">
    <meta property="og:description"   content="<?=$page->description?>">
    <meta property="og:image"         content="">
    <meta property="fb:app_id"        content="">
</head>
<body></body>
</html>



        <?php endif;
    }


}