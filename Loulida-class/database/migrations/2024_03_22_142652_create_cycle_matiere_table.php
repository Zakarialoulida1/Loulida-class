<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCycleMatiereTable extends Migration
{
    public function up()
    {
        Schema::create('cycle_matiere', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cycle_educative_id')->constrained()->onDelete('cascade');
            $table->foreignId('matiere_id')->constrained()->onDelete('cascade');
            // Add other columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cycle_matiere');
    }
}
