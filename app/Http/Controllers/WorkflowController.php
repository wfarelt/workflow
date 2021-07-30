<?php

namespace App\Http\Controllers;

use App\Models\Workflow;
use App\Models\WorkflowTarea;
use App\Models\WorkflowAccione;
use App\Models\WorkflowEstado;
use Illuminate\Http\Request;



/**
 * Class WorkflowController
 * @package App\Http\Controllers
 */
class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function index()
    {
        $workflows = Workflow::paginate();
        

        return view('workflow.index', compact('workflows'))
            ->with('i', (request()->input('page', 1) - 1) * $workflows->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workflow = new Workflow();
        $workflow_estados = WorkflowEstado::pluck('descripcion','id');
        $workflow_acciones = WorkflowAccione::pluck('descripcion','id');
        $workflow_tareas = WorkflowTarea::pluck('descripcion','id');
        return view('workflow.create', compact('workflow', 'workflow_tareas', 'workflow_estados', 'workflow_acciones'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Workflow::$rules);

        $workflow = Workflow::create($request->all());

        return redirect()->route('workflows.index')
            ->with('success', 'Workflow created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workflow = Workflow::find($id);
        $workflow_tareas = WorkflowTarea::pluck('descripcion','id');
        return view('workflow.show', compact('workflow','workflow_tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workflow = Workflow::find($id);
        $workflow_estados = WorkflowEstado::pluck('descripcion','id');
        $workflow_acciones = WorkflowAccione::pluck('descripcion','id');
        $workflow_tareas = WorkflowTarea::pluck('descripcion','id');
        return view('workflow.edit', compact('workflow','workflow_tareas','workflow_estados','workflow_acciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Workflow $workflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workflow $workflow)
    {
        request()->validate(Workflow::$rules);

        $workflow->update($request->all());

        return redirect()->route('workflows.index')
            ->with('success', 'Workflow updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflow = Workflow::find($id)->delete();

        return redirect()->route('workflows.index')
            ->with('success', 'Workflow deleted successfully');
    }
}
