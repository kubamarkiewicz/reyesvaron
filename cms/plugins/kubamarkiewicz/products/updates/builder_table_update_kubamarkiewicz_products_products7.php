<?php namespace KubaMarkiewicz\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateKubamarkiewiczProductsProducts7 extends Migration
{
    public function up()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->text('url');
        });
    }
    
    public function down()
    {
        Schema::table('kubamarkiewicz_products_products', function($table)
        {
            $table->dropColumn('url');
        });
    }
}