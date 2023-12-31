<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('midname');
            $table->string('surname');
            $table->string('username');
            $table->string('email');
            $table->string('voteNumber');
            $table->string('regNo');
            $table->string('phoneNumber');
            $table->string('photoUrl');
            $table->string('college');
            $table->string('programme');
            $table->string('yearOfStudy');
            $table->string('role');
            $table->string('voteStatus');
            $table->text('description');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
