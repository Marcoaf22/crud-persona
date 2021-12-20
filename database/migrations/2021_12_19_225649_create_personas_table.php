<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('per_nombre', 150);
            $table->string('per_appm', 150)->nullable();
            $table->string('per_prof', 150);
            $table->string('per_telf');
            $table->string('per_cel');
            $table->string('per_email')->unique();
            $table->string('per_dir', 150);
            $table->date('per_fnac');
            $table->string('per_lnac', 150);
            $table->boolean('per_estado')->default(true);
            $table->longText('per_content');
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
        Schema::dropIfExists('personas');
    }
}
