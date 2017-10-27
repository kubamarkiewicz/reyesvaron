<?php namespace KubaMarkiewicz\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczProductsProducts extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->text('block_1');
            $table->text('block_2');
            $table->text('block_3');
            $table->text('block_4');
            $table->text('block_5');
            $table->text('block_6');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->dropColumn('block_1');
            $table->dropColumn('block_2');
            $table->dropColumn('block_3');
            $table->dropColumn('block_4');
            $table->dropColumn('block_5');
            $table->dropColumn('block_6');
            $table->increments('id')->unsigned()->change();
        });
    }
}
