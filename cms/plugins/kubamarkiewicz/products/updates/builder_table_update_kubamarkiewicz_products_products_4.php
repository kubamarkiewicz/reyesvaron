<?php namespace KubaMarkiewicz\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczProductsProducts4 extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->text('section_1');
            $table->text('section_2');
            $table->text('section_3');
            $table->text('section_4');
            $table->text('section_5');
            $table->text('section_6');
            $table->dropColumn('block_1');
            $table->dropColumn('block_2');
            $table->dropColumn('block_3');
            $table->dropColumn('block_4');
            $table->dropColumn('block_5');
            $table->dropColumn('block_6');
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->dropColumn('section_1');
            $table->dropColumn('section_2');
            $table->dropColumn('section_3');
            $table->dropColumn('section_4');
            $table->dropColumn('section_5');
            $table->dropColumn('section_6');
            $table->text('block_1');
            $table->text('block_2');
            $table->text('block_3');
            $table->text('block_4');
            $table->text('block_5');
            $table->text('block_6');
        });
    }
}
