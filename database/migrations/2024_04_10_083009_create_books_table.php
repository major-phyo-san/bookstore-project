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
                Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constraint()->onDelete('cascade');
                $table->foreignId('sub_category_id')->constraint()->onDelete('cascade');
                $table->string('title');
                $table->string('author');
                $table->text('description');
                $table->decimal('price');
                $table->unsignedTinyInteger('rating');
                $table->string('front_cover_url')->nullable();
                $table->string('back_cover_url')->nullable();
                $table->timestamps();
            });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
