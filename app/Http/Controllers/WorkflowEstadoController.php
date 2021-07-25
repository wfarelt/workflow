<?php

namespace App\Http\Controllers;

use App\Models\WorkflowEstado;
use Illuminate\Http\Request;

/**
 * Class WorkflowEstadoController
 * @package App\Http\Controllers
 */
class WorkflowEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workflowEstados = WorkflowEstado::paginate();

        return view('workflow-estado.index', compact('workflowEstados'))
            ->with('i', (request()->input('page', 1) - 1) * $workflowEstados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workflowEstado = new WorkflowEstado();
        return view('workflow-estado.create', compact('workflowEstado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WorkflowEstado::$rules);

        $workflowEstado = WorkflowEstado::create($request->all());

        return redirect()->route('workflow-estados.index')
            ->with('success', 'WorkflowEstado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workflowEstado = WorkflowEstado::find($id);

        return view('workflow-estado.show', compact('workflowEstado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workflowEstado = WorkflowEstado::find($id);

        return view('workflow-estado.edit', compact('workflowEstado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WorkflowEstado $workflowEstado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkflowEstado $workflowEstado)
    {
        request()->validate(WorkflowEstado::$rules);

        $workflowEstado->update($request->all());

        return redirect()->route('workflow-estados.index')
            ->with('success', 'WorkflowEstado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowEstado = WorkflowEstado::find($id)->delete();

        return redirect()->route('workflow-estados.index')
            ->with('success', 'WorkflowEstado deleted successfully');
    }
}
