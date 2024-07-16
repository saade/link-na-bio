<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url', 2083);
            $table->string('background_color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('border_radius')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('is_active')->default(true);

            $table->foreignId('page_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
