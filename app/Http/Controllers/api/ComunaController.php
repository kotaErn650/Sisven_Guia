<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class ComunaController extends Controller
{
    public function index()
    {
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.comu_codi', 'tb_comuna.comu_nomb', 'tb_municipio.muni_nomb')
            ->get();
        return response()->json($comunas);
    }

    public function store(Request $request)
    {
        $comuna = Comuna::create([
            'comu_nomb' => $request->name,
            'muni_codi' => $request->code,
        ]);

        return response()->json($comuna, 201);
    }

    public function show($id)
    {
        $comuna = Comuna::find($id);

        if (!$comuna) {
            return response()->json(['message' => 'Comuna no encontrada'], 404);
        }

        return response()->json($comuna);
    }

    public function update(Request $request, $id)
    {
        $comuna = Comuna::find($id);

        if (!$comuna) {
            return response()->json(['message' => 'Comuna no encontrada'], 404);
        }

        $comuna->update([
            'comu_nomb' => $request->name,
            'muni_codi' => $request->code,
        ]);

        return response()->json($comuna);
    }

    public function destroy($id)
    {
        $comuna = Comuna::find($id);

        if (!$comuna) {
            return response()->json(['message' => 'Comuna no encontrada'], 404);
        }

        $comuna->delete();

        return response()->json(['message' => 'Comuna eliminada correctamente']);
    }
}