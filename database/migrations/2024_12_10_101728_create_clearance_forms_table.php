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
    Schema::create('clearance_forms', function (Blueprint $table) {
        $table->id(); // Automatically creates an auto-incrementing primary key
        $table->unsignedBigInteger('user_id'); // Foreign key for the user
        $table->string('name'); // Name of the person requesting the clearance
        $table->string('purpose'); // Purpose of the clearance
        $table->enum('status', ['pending', 'released', 'cancelled'])->default('pending'); // Status of the clearance request
        $table->timestamps(); // Created at and updated at timestamps
        
        // Adding foreign key constraint (if you have a users table)
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearance_forms');
    }
};
