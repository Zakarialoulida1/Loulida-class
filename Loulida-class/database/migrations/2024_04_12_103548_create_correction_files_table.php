<?php

// database/migrations/YYYY_MM_DD_create_correction_files_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectionFilesTable extends Migration
{
    public function up()
    {
        Schema::create('correction_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_file_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('correction_files');
    }
}
