<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechaPrestamoToPrestamosTable extends Migration
{
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->date('fecha_prestamo')->nullable();
        });
    }

    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropColumn('fecha_prestamo');
        });
        Schema::table('prestamos', function (Blueprint $table) {
            $table->date('fecha_devolucion')->nullable();
        });
        
    }
}