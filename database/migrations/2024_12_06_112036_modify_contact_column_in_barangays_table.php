<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyContactColumnInBarangaysTable extends Migration
{
    public function up()
    {
        Schema::table('barangays', function (Blueprint $table) {
            $table->string('contact')->nullable(false)->change(); // Make contact not nullable
        });
    }

    public function down()
    {
        Schema::table('barangays', function (Blueprint $table) {
            $table->string('contact')->nullable()->change(); // Revert to nullable if needed
        });
    }
}