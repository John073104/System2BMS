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
        $table->date('release_date')->nullable();  // Add nullable if you want to allow it to be empty
    });
}

public function down()
{
    Schema::table('clearances', function (Blueprint $table) {
        $table->dropColumn('release_date');
    });
}

};
