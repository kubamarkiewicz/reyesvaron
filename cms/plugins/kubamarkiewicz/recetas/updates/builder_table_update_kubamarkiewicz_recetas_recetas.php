<?php namespace KubaMarkiewicz\Recetas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczRecetasRecetas extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_recetas_recetas', function($table)
        {
            $table->boolean('published')->default(0);
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_recetas_recetas', function($table)
        {
            $table->dropColumn('published');
            $table->increments('id')->unsigned()->change();
        });
    }
}
