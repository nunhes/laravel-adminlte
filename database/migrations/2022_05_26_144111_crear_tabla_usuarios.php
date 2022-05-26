<?php

use App\Models\Usuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('dni');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->enum('tipo_usuario',['ADMIN','TRABAJADOR']);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
        $usuario = new Usuario();
        $usuario->nombre = 'Administrador del sistema';
        $usuario->dni = '12345678';
        $usuario->usuario = 'admin';
        $usuario->password='admin';
        $usuario->tipo_usuario = 'ADMIN';
        $usuario->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
