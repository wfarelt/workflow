<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkflowEstado
 *
 * @property $id
 * @property $descripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class WorkflowEstado extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','estado'];

    public function tareas()
    {
      return $this->belongsToMany('App\Models\Tarea','id', 'tarea_id');
    }


}
