<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('place_of_birth');
            $table->integer('age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('civil_status');
            $table->string('purok');
            $table->boolean('four_ps_beneficiary');
            $table->string('nationality');
            $table->string('national_id');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('residents');
    }
}