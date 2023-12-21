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
        Schema::create('insidens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id');
            $table->string('judul')->nullable();
            $table->text('detail');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('insidens');
    }
};
