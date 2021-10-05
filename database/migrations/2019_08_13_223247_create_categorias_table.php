<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateCategoriasTable extends Migration
{
   
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('descripcion', 256);
            $table->boolean('condicion')->default(1);
            $table->timestamps();
        });
    }
 
  
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}