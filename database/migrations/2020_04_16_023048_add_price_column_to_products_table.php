<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceColumnToProductsTable extends Migration
{
    const TABLE_NAME = "products";
    const COLUMN_NAME = "price";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!$this->hasColumn()) {
            Schema::table('products', function (Blueprint $table) {
                $table->unsignedInteger(self::COLUMN_NAME)->nullable(); // non negative
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if($this->hasColumn()) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn(self::COLUMN_NAME);
            });
        }
    }

    /**
     * @return bool
     */
    private function hasColumn()
    {
        return Schema::hasColumn(self::TABLE_NAME, self::COLUMN_NAME);
    }
}
