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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('kode',20);
            $table->string('nama',100);
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('tempat_lahir',100);
            $table->string('tanggal_lahir');
            $table->string('telepon',15);
            $table->text('alamat');
            $table->string('foto',255);
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
        Schema::dropIfExists('anggotas');
    }
};
