<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('scholarship_id');
            $table->string('appli_poli');
            $table->string('qualification');
            $table->string('amount_of_grant');
            $table->string('gen_guideline');
            $table->string('contact_info');
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
        Schema::dropIfExists('scholarship_details');
    }
}
