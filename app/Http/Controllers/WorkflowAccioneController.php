<?php

namespace App\Http\Controllers;

use App\Models\WorkflowAccione;
use Illuminate\Http\Request;

/**
 * Class WorkflowAccioneController
 * @package App\Http\Controllers
 */
class WorkflowAccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workflowAcciones = WorkflowAccione::paginate();

        return view('workflow-accione.index', compact('workflowAcciones'))
            ->with('i', (request()->input('page', 1) - 1) * $workflowAcciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workflowAccione = new WorkflowAccione();
        return view('workflow-accione.create', compact('workflowAccione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WorkflowAccione::$rules);

        $workflowAccione = WorkflowAccione::create($request->all());

        return redirect()->route('workflow-acciones.index')
            ->with('success', 'WorkflowAccione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workflowAccione = WorkflowAccione::find($id);

        return view('workflow-accione.show', compact('workflowAccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workflowAccione = WorkflowAccione::find($id);

        return view('workflow-accione.edit', compact('workflowAccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WorkflowAccione $workflowAccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkflowAccione $workflowAccione)
    {
        request()->validate(WorkflowAccione::$rules);

        $workflowAccione->update($request->all());

        return redirect()->route('workflow-acciones.index')
            ->with('success', 'WorkflowAccione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowAccione = WorkflowAccione::find($id)->delete();

        return redirect()->route('workflow-acciones.index')
            ->with('success', 'WorkflowAccione deleted successfully');
    }
}
