<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::table('orders', function (Blueprint $table) {
                $table->string('courier_name')->after('grand_total');
                $table->string('traking_number')->after('courier_name');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('courier_name')->nullable();
            $table->dropColumn('traking_number')->nullable();
        });
    }
}
