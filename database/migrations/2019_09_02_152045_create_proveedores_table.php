<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateProveedoresTable extends Migration
{
 
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('contacto',50)->nullable();
            $table->string('telefono_contacto',50)->nullable(); 
             
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade'); 
             
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}