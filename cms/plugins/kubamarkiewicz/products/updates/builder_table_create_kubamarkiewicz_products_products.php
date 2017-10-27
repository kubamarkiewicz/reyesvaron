<?php namespace KubaMarkiewicz\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKubamarkiewiczProductsProducts extends Migration
{
    public function up()
    {
        Schema::create('kubamarkiewicz_products_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('kubamarkiewicz_products_products');
    }
}
