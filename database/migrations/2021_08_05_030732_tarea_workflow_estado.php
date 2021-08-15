<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TareaWorkflowEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tarea_workflow_estados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->unsignedBigInteger('workflow_estado_id'); 
            $table->unsignedBigInteger('tarea_id'); 

            //forenkey
            $table->foreign('workflow_estado_id')
                ->references('id')
                ->on('workflow_estados')
                ->onDelete('cascade');
        
            $table->foreign('tarea_id')
            ->references('id')
            ->on('tareas')
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
