<?php namespace KubaMarkiewicz\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKubamarkiewiczNewsNews extends Migration
{
    public function up()
    {
        Schema::create('kubamarkiewicz_news_news', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('date');
            $table->string('name');
            $table->text('content');
            $table->boolean('published')->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kubamarkiewicz_news_news');
    }
}
