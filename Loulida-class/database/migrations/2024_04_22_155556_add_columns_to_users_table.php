<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the new columns
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
          
            
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the added columns if needed
            $table->dropColumn(['address', 'phone', 'description']);


       
        });
    }
}

