<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarisanBudayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warisan_budaya', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->string("domain");
            $table->string("kondisi");
            $table->string("lokasi");
            $table->mediumText("deskripsi");
            $table->string("pelaku")->nullable();
            $table->string("maestro")->nullable();
            $table->string("foto")->nullable();
            $table->string("video")->nullable();
            $table->string("file")->nullable();
            $table->integer("user_id");
            $table->integer("is_approved", )->default(0);
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
        Schema::dropIfExists('warisan_budayas');
    }
}
