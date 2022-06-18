<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('mobile_number');
            
            $table->string('address');
            $table->string('department');
            $table->string('salary')->nullable();
            $table->string('membership');
            $table->string('imployment');
            $table->string('total_contribution')->nullable();
            $table->string('current_loan');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
