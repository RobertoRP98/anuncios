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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
          
            $table->string('title');
                // Slug para URL amigable
            $table->string('slug')->unique();

            $table->text('body');

            // Relaciones
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->foreignId('municipio_id')->constrained('municipios')->onDelete('cascade');

          

            // Estado del post
            $table->boolean('is_premium')->default(false);
            $table->enum('premium_level', ['oro', 'plata', 'bronce'])->nullable(); // Prioridad
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();

            // Otros
            $table->boolean('is_active')->default(true); // Si está visible o no
            $table->timestamps();

            $table->foreignId('plan_id')->nullable()->constrained()->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
