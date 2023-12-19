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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('logo')->nullable();  
            $table->string('support_phone')->nullable();  
            $table->text('company_address')->nullable();  
            $table->string('email')->nullable();  
            $table->string('facebook')->nullable();  
            $table->string('twitter')->nullable();  
            $table->string('copyright')->nullable();  

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
