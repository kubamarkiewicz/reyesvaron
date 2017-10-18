<?php namespace KubaMarkiewicz\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczProductsProducts5 extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->text('section_7');
            $table->text('section_8');
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->dropColumn('section_7');
            $table->dropColumn('section_8');
        });
    }
}
