<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            // Change publiccheck column to nullable column
            $table->boolean('publiccheck')->nullable()->change();
            // Change identity size to integer(16)
            $table->bigInteger('identity')->change();
            // Add phone number column
            $table->bigInteger('phone_nr');
            // Add email column
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
