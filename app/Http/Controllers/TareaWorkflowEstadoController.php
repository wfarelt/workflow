<?php

namespace App\Http\Controllers;

use App\Models\TareaWorkflowEstado;
use App\Models\Tarea;
use Illuminate\Http\Request;

/**
 * Class TareaWorkflowEstadoController
 * @package App\Http\Controllers
 */
class TareaWorkflowEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareaWorkflowEstados = TareaWorkflowEstado::paginate();

        return view('tarea-workflow-estado.index', compact('tareaWorkflowEstados'))
            ->with('i', (request()->input('page', 1) - 1) * $tareaWorkflowEstados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tareaWorkflowEstado = new TareaWorkflowEstado();
        $tareas = Tarea::pluck('id');
        return view('tarea-workflow-estado.create', compact('tareaWorkflowEstado','tareas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(TareaWorkflowEstado::$rules);

        $tareaWorkflowEstado = TareaWorkflowEstado::create($request->all());

        return redirect()->route('tareas.show', $request->tarea_id)
            ->with('success', 'TareaWorkflowEstado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareaWorkflowEstado = TareaWorkflowEstado::find($id);

        return view('tarea-workflow-estado.show', compact('tareaWorkflowEstado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tareaWorkflowEstado = TareaWorkflowEstado::find($id);

        return view('tarea-workflow-estado.edit', compact('tareaWorkflowEstado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TareaWorkflowEstado $tareaWorkflowEstado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TareaWorkflowEstado $tareaWorkflowEstado)
    {
        request()->validate(TareaWorkflowEstado::$rules);

        $tareaWorkflowEstado->update($request->all());

        return redirect()->route('tarea-workflow-estados.index')
            ->with('success', 'TareaWorkflowEstado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tareaWorkflowEstado = TareaWorkflowEstado::find($id)->delete();

        return redirect()->route('tarea-workflow-estados.index')
            ->with('success', 'TareaWorkflowEstado deleted successfully');
    }
}
