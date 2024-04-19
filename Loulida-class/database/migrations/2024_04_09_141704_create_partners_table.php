<?php
// database/migrations/YYYY_MM_DD_create_partners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Teacher','Investor']); // Indicates whether the partner is a teacher or investor
            $table->string('phone')->nullable();
            $table->string('Address');
          
            $table->text('description')->nullable();
            $table->string('cv')->nullable(); // Path to the CV file
           $table->enum('status',['non_valide','validé'])->default('non_valide');  
         
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
