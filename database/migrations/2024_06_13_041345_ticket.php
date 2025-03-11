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
        Schema::create('ticket',function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->enum('aplikasi',['INSLOPE (Sistem Manajemen Lereng Jalan)','SMD (Sistem Masukan Data)','SIDAKO-POK']);
            $table->string('subjek');
            $table->text('deskripsi');
            $table->enum('prioritas',['Urgent','High','Medium','Low'])->nullable();
            $table->string('agent')->nullable();
            $table->enum('status',['pending','open','closed','in progress', 'solved'])->default('pending');
            $table->timestamps();
            $table->text('feedback')->nullable();
            $table->integer('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
