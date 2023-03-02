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
            $table->id('user_id');
            $table->string('name', 20)->nullable(false);
            $table->string('surnames', 40)->nullable(false);
            $table->string('dni', 9)->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->string('phone', 12)->nullable();
            $table->string('country')->nullable();
            $table->string('iban')->nullable(false);
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
