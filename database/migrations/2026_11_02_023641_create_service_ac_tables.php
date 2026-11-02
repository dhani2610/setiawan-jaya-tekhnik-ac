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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Jasa Service AC');
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('whatsapp_number')->default('+62 878-6934-6820');
            $table->string('phone_number')->default('+62 878-6934-6820');
            $table->text('address')->nullable();
            $table->text('google_maps_iframe')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->timestamps();
        });

        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('image_path')->nullable();
            $table->string('cta_text')->default('Hubungi Kami');
            $table->string('cta_link')->default('#kontak');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price_range');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('has_warranty')->default(true);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('advantages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon_class')->default('fa-solid fa-award');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('about_image')->nullable();
            $table->longText('about_content')->nullable();
            $table->longText('vision_mission_content')->nullable();
            $table->timestamps();
        });

        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('stat_key')->nullable();
            $table->string('stat_value');
            $table->string('stat_label');
            $table->string('icon_class')->default('fa-solid fa-chart-line');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_role_location')->nullable();
            $table->string('client_photo')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->text('review_text');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('cover_image')->nullable();
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('views_count')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            $table->string('author_name');
            $table->string('author_email')->nullable();
            $table->text('comment_text');
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('statistics');
        Schema::dropIfExists('company_profiles');
        Schema::dropIfExists('advantages');
        Schema::dropIfExists('promos');
        Schema::dropIfExists('services');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('settings');
    }
};
