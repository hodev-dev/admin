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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('system')->nullable()->default('');
            $table->string('title')->nullable()->default('');
            $table->string('did')->nullable()->default('');
            $table->string('phone')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('district')->nullable()->default('');
            $table->string('category')->nullable()->default('');
            $table->string('page')->nullable()->default('');
            $table->string('index')->nullable()->default('');
            $table->string('from')->nullable()->default('');
            $table->text('jwt')->nullable()->default('');
            $table->string('stamps')->nullable()->default('');
            $table->string('data')->nullable()->default('');
            $table->string('req')->nullable()->default('');
            $table->string('last')->nullable()->default('');
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
        Schema::dropIfExists('phones');
    }
};
