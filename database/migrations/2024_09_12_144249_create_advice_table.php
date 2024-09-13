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
        Schema::create('advice', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('advice_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('advice_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('name')->nullable();
            $table->text('information')->nullable();
            $table->text('actual_tip')->nullable();
            $table->text('tip_example')->nullable();
            $table->timestamps();

            $table->foreign('advice_id')->references('id')->on('advice')->onDelete('cascade');
            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->index(['advice_id', 'lang_id']);
        });

        // db scheme

        // CREATE TABLE `advice` (
        //     `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
        //     `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        //     `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        //     PRIMARY KEY (`id`)
        //   );

        //   CREATE TABLE `advice_translations` (
        //     `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
        //     `advice_id` bigint UNSIGNED NOT NULL,
        //     `lang_id` bigint UNSIGNED NOT NULL,
        //     `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        //     `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
        //     `actual_tip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
        //     `tip_example` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
        //     `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        //     `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        //     PRIMARY KEY (`id`),
        //     FOREIGN KEY (`advice_id`) REFERENCES `advice`(`id`) ON DELETE CASCADE,
        //     INDEX `idx_advice_lang` (`advice_id`, `lang_id`)
        //   );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advice_translations');
        Schema::dropIfExists('advice');
    }
};
