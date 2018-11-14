<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->default('none');
            $table->string('company_email')->default('none');
            $table->string('company_website')->default('none');
            $table->string('company_logo')->default('none');
            $table->text('company_desc');
            $table->string('company_model')->default('none');
            $table->string('rand_value')->default('none');
            $table->string('creator_username')->default('none');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
