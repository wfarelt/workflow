<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Workflow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('workflows', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('workflow_estado_id'); 
            $table->unsignedBigInteger('siguiente_estado_id'); 
            $table->unsignedBigInteger('workflow_accione_id'); 
            $table->unsignedBigInteger('workflow_tarea_id'); 

            //forenkey
            $table->foreign('workflow_estado_id')
                ->references('id')
                ->on('workflow_estados')
                ->onDelete('cascade');
        
            $table->foreign('workflow_accione_id')
            ->references('id')
            ->on('workflow_acciones')
            ->onDelete('cascade');

            $table->foreign('workflow_tarea_id')
            ->references('id')
            ->on('workflow_tareas')
            ->onDelete('cascade');
            
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
        //
    }
}
