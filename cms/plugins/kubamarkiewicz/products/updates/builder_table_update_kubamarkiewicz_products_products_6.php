<?php namespace KubaMarkiewicz\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczProductsProducts6 extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->text('section_9');
            $table->text('section_10');
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->dropColumn('section_9');
            $table->dropColumn('section_10');
        });
    }
}
