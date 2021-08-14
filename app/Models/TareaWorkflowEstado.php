<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TareaWorkflowEstado
 *
 * @property $id
 * @property $descripcion
 * @property $workflow_estado_id
 * @property $tarea_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Tarea $tarea
 * @property WorkflowEstado $workflowEstado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TareaWorkflowEstado extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'workflow_estado_id' => 'required',
		'tarea_id' => 'required',
        'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','workflow_estado_id','tarea_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tarea()
    {
        return $this->hasOne('App\Models\Tarea', 'id', 'tarea_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workflowEstado()
    {
        return $this->hasOne('App\Models\WorkflowEstado', 'id', 'workflow_estado_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
