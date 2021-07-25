<?php

namespace App\Http\Controllers;

use App\Models\WorkflowTarea;
use Illuminate\Http\Request;

/**
 * Class WorkflowTareaController
 * @package App\Http\Controllers
 */
class WorkflowTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workflowTareas = WorkflowTarea::paginate();

        return view('workflow-tarea.index', compact('workflowTareas'))
            ->with('i', (request()->input('page', 1) - 1) * $workflowTareas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workflowTarea = new WorkflowTarea();
        return view('workflow-tarea.create', compact('workflowTarea'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WorkflowTarea::$rules);

        $workflowTarea = WorkflowTarea::create($request->all());

        return redirect()->route('workflow-tareas.index')
            ->with('success', 'WorkflowTarea created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workflowTarea = WorkflowTarea::find($id);

        return view('workflow-tarea.show', compact('workflowTarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workflowTarea = WorkflowTarea::find($id);

        return view('workflow-tarea.edit', compact('workflowTarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WorkflowTarea $workflowTarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkflowTarea $workflowTarea)
    {
        request()->validate(WorkflowTarea::$rules);

        $workflowTarea->update($request->all());

        return redirect()->route('workflow-tareas.index')
            ->with('success', 'WorkflowTarea updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowTarea = WorkflowTarea::find($id)->delete();

        return redirect()->route('workflow-tareas.index')
            ->with('success', 'WorkflowTarea deleted successfully');
    }
}
