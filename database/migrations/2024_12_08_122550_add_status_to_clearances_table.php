<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('clearances', function (Blueprint $table) {
        $table->string('status')->default('pending'); // Add status column with a default value of 'pending'
    });
}

public function down()
{
    Schema::table('clearances', function (Blueprint $table) {
        $table->dropColumn('status'); // Drop the status column if you roll back the migration
    });
}

};
