<?php

// database/migrations/YYYY_MM_DD_add_social_media_to_partners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialMediaToPartnersTable extends Migration
{
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->json('Social_Media')->nullable(); 
            $table->foreignId('matiere_id')->constrained()->onDelete('cascade'); // Foreign key for matiere table
         
        });
    }

    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('Social_Media');
            $table->dropColumn('matiere_id');
            // Drop the column if needed
        });
    }
}

