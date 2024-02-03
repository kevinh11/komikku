<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->integer('stock_remaining');
            $table->float('avg_review');
            $table->integer('review_amount')->default(0);
            $table->string('authors')->nullable();
            $table->string('volume');
            $table->string('description');
            $table->float('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};
