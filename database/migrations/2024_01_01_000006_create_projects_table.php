<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('tagline')->nullable();
            $table->string('client')->nullable();
            $table->string('date_range')->nullable();
            $table->string('services')->nullable();
            $table->string('deliverables')->nullable();
            $table->string('website_url')->nullable();
            $table->string('icon_url')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('exec_image')->nullable();
            $table->text('about_col1')->nullable();
            $table->text('about_col2')->nullable();
            $table->text('exec_col1')->nullable();
            $table->text('exec_col2')->nullable();
            $table->string('category')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
