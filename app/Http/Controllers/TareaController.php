<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Workflow;
use App\Models\WorkflowTarea;
use App\Models\TareaWorkflowEstado;

use Illuminate\Http\Request;

/**
 * Class TareaController
 * @package App\Http\Controllers
 */
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::paginate();

        return view('tarea.index', compact('tareas'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $tarea = new Tarea();
        $workflow_tareas = WorkflowTarea::pluck('descripcion','id');
        return view('tarea.create', compact('tarea', 'workflow_tareas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tarea::$rules);

        $tarea = Tarea::create($request->all());

        $workflow = Workflow::where('workflow_tarea_id', $tarea->workflow_tarea_id)->first();
        $tareaWorkflowEstado = new TareaWorkflowEstado();
        $tareaWorkflowEstado->workflow_estado_id = $workflow->workflow_estado_id;
        $tareaWorkflowEstado->descripcion = "Hola";
        $tareaWorkflowEstado->tarea_id = $tarea->id;
        $tareaWorkflowEstado->save();
        
        return redirect()->route('tarea-workflow-estados.edit',$tareaWorkflowEstado->id);

        
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        $tarea_workflow_estados = TareaWorkflowEstado::where('tarea_id', $tarea->id)->get();
        $tarea_workflow_estado_last = $tarea_workflow_estados->last();

        
        $workflows = Workflow::where('workflow_tarea_id', $tarea->workflow_tarea_id)->where('workflow_estado_id', $tarea_workflow_estado_last->workflow_estado_id )->get();

        return view('tarea.show', compact('tarea','tarea_workflow_estados','workflows','tarea_workflow_estado_last'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $workflow_tareas = WorkflowTarea::pluck('descripcion','id');
        return view('tarea.edit', compact('tarea','workflow_tareas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tarea $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id)->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea deleted successfully');
    }
    
}
