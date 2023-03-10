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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('stack')->nullable();
            $table->json('database_driver')->nullable();
            $table->json('devops')->nullable();
            $table->string('ceo')->nullable();
            $table->string('ceo_contact')->nullable();
            $table->string('cto')->nullable();
            $table->string('cto_contact')->nullable();
            $table->string('hr')->nullable();
            $table->string('hr_contact')->nullable();
            $table->string('testimonials')->nullable();
            $table->string('salary_range')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};