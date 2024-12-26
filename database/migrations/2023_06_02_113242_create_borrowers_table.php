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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('library_book_id');
            $table->string('borrower_fname');
            $table->string('borrower_lname');
            $table->string('borrower_phone');
            $table->string('borrower_id_num');
            $table->string('borrower_email');
            $table->string('borrower_course_and_year');
            $table->date('return_date');
            $table->timestamps();
            $table->foreign('library_book_id')->references('id')->on('library_books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
};
