<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            /*
            $table->id("customer_id");
            $table->text("firstname");
            $table->text("lastname");
            $table->text("phone_number");
            $table->text("email");
            $table->text("password");
            $table->foreignId("address_id")->index("address_id");
            $table->text("login");
            $table->timestamps();
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
