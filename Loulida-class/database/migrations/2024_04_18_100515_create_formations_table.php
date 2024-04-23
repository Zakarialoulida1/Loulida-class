<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cycle_educative_id')->constrained('cycle_educatives');
            $table->integer('available_place');
            $table->decimal('price', 10, 2);
            $table->integer('duration_months'); // Change duration to duration_months duration_months
            $table->text('description')->nullable();
            $table->string('image')->nullable(); 
          
            $table->timestamps();
        });

        Schema::create('formation_matiere', function (Blueprint $table) {
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->foreignId('matiere_id')->constrained();
            $table->primary(['formation_id', 'matiere_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('formations');
        Schema::dropIfExists('formation_matiere');
    }
}
