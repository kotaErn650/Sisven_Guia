<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::with('departamento')->get();
        return view('municipio.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('municipio.new', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'muni_nomb' => 'required|string|max:30',
            'depa_codi' => 'required|exists:tb_departamento,depa_codi',
        ]);

        Municipio::create($request->all());
        return redirect()->route('municipio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $municipio = Municipio::findOrFail($id);
        $departamentos = Departamento::all();
        return view('municipio.edit', compact('municipio', 'departamentos')); 
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'muni_nomb' => 'required|string|max:30',
            'depa_codi' => 'required|exists:tb_departamento,depa_codi',
        ]);

        $municipio = Municipio::findOrFail($id);
        $municipio->update($request->all());
        return redirect()->route('municipio.index');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return redirect()->route('municipio.index');
    }
}
