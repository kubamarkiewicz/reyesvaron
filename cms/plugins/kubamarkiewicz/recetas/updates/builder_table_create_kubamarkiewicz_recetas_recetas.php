<?php namespace KubaMarkiewicz\Recetas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateKubamarkiewiczRecetasRecetas extends Migration
{
    public function up()
    {
        Schema::create('kubamarkiewicz_recetas_recetas', function($table)
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
        Schema::dropIfExists('kubamarkiewicz_recetas_recetas');
    }
}
