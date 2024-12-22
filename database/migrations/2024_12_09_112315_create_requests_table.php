<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('details');
            $table->string('status')->default('pending'); // 'pending', 'approved', 'rejected'
            $table->timestamp('release_date')->nullable()->after('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('release_date');
        });
    }
}