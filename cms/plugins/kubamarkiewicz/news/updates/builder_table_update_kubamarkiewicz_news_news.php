<?php namespace KubaMarkiewicz\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczNewsNews extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_news_news', function($table)
        {
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_news_news', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
