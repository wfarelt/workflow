<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarea
 *
 * @property $id
 * @property $workflow_tarea_id
 * @property $created_at
 * @property $updated_at
 *
 * @property WorkflowTarea $workflowTarea
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tarea extends Model
{
    
    static $rules = [
		'workflow_tarea_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['workflow_tarea_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workflowTarea()
    {
        return $this->hasOne('App\Models\WorkflowTarea', 'id', 'workflow_tarea_id');
    }
    
    public function workflowEstados()
    {
      return $this->belongsToMany('App\Models\WorkflowEstado', 'id', 'workflow_estado_id');
    } 

}
