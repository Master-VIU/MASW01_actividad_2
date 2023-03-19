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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 20)->nullable(false);
            $table->string('surnames', 40)->nullable(false);
            $table->string('dni', 9)->nullable(false)->unique();
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('password', 100)->nullable(false);
            $table->string('phone', 12)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('iban', 50)->nullable(false);
            $table->string('over_you', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
