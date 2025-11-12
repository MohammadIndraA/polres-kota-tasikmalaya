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
        Schema::create('sub_pelayanan_publiks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();

             // Jika category_id pakai UUID
            $table->uuid('pelayanan_publik_id')->nullable();
            $table->foreign('pelayanan_publik_id')
                  ->references('id')
                  ->on('pelayanan_publiks')
                  ->onDelete('set null');

            $table->index('pelayanan_publik_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_pelayanan_publiks');
    }
};
