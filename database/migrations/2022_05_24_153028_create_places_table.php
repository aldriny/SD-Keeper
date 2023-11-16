<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('type');
            $table->string('filenames');
            $table->string('area');
            $table->text('email');
            $table->string('password');
            $table->string('phone_number');
            $table->string('safety')->default('safe');
            $table->string('access_token');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
