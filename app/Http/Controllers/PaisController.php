<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    public function index()
    {
        $paises = DB::table('tb_pais')->get();
        return view('pais.index', ['paises' => $paises]);
    }

    public function create()
    {
        return view('pais.new');
    }

    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->pais_codi = $request->code;
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->capital;
        $pais->save();

        return redirect()->route('pais.index');
    }

    public function edit($id)
    {
        $pais = DB::table('tb_pais')->where('pais_codi', $id)->first();
        
        if(!$pais) {
            return redirect()->route('pais.index')->with('error', 'País no encontrado');
        }
        
        return view('pais.edit', ['pais' => $pais]);
    }

    public function update(Request $request, $id)
    {
        $pais = Pais::where('pais_codi', $id)->first();
        
        if(!$pais) {
            return redirect()->route('pais.index')->with('error', 'País no encontrado');
        }
        
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->capital;
        $pais->save();

        return redirect()->route('pais.index')->with('success', 'País actualizado correctamente');
    }

    public function destroy($id)
    {
        $pais = Pais::where('pais_codi', $id)->first();
        
        if(!$pais) {
            return redirect()->route('pais.index')->with('error', 'País no encontrado');
        }
        
        $pais->delete();
        return redirect()->route('pais.index')->with('success', 'País eliminado correctamente');
    }
}