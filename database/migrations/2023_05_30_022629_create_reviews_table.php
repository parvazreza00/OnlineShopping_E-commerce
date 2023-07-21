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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedSmallInteger('user_id');
            $table->text('comments');
            $table->string('summery');
            $table->integer('rating')->nullable();
            $table->foreign('product_id')
                    ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')->on('users')->onDelete('cascade');        
            $table->string('status')->default(0);
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
        Schema::dropIfExists('reviews');
    }
};
