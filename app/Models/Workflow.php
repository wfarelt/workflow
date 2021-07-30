<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Workflow
 *
 * @property $id
 * @property $workflow_estado_id
 * @property $siguiente_estado_id
 * @property $workflow_accione_id
 * @property $workflow_tarea_id
 * @property $created_at
 * @property $updated_at
 *
 * @property WorkflowAccione $workflowAccione
 * @property WorkflowEstado $workflowEstado
 * @property WorkflowTarea $workflowTarea
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Workflow extends Model
{
    
    static $rules = [
		'workflow_estado_id' => 'required',
		'siguiente_estado_id' => 'required',
		'workflow_accione_id' => 'required',
		'workflow_tarea_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['workflow_estado_id','siguiente_estado_id','workflow_accione_id','workflow_tarea_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workflowAccione()
    {
        return $this->hasOne('App\Models\WorkflowAccione', 'id', 'workflow_accione_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workflowEstado()
    {
        return $this->hasOne('App\Models\WorkflowEstado', 'id', 'workflow_estado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workflowTarea()
    {
        return $this->hasOne('App\Models\WorkflowTarea', 'id', 'workflow_tarea_id');
    
    }
    

}
