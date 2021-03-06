<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengusulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengusulan', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->enum("kondisi", ['berkembang', 'bertahan', 'berkurang', 'terancam', 'punah']);
            $table->string("lokasi");
            $table->mediumText("deskripsi");
            $table->string("pelaku")->nullable();
            $table->json("foto")->nullable();
            $table->string("video")->nullable();
            $table->string("domain");
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
        Schema::dropIfExists('pengusulans');
    }
}
