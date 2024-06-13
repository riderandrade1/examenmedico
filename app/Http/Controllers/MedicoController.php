<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Http\Requests\MedicoFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MedicoController extends Controller
{
    public function __construct()
    {
        // Constructor vacío por ahora
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');

        $medicos = Medico::where(function ($query) use ($texto) {
            $query->where('nombre', 'LIKE', '%' . $texto . '%')
                  ->orWhere('especialidad', 'LIKE', '%' . $texto . '%');
        })
        ->orderBy('id_medico', 'desc')
        ->paginate(10);

        return view('almacen.medico.index', compact('medicos', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("almacen.medico.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicoFormRequest $request)
{
    $medico = new Medico;
    $medico->nombre = $request->get('nombre');
    $medico->especialidad = $request->get('especialidad');
    $medico->aniosservicio = $request->get('aniosservicio');
    
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $nombrefoto = Str::slug($request->get('nombre')) . '.' . $foto->getClientOriginalExtension();
        $ruta = public_path("/imagenes/medico/");
        
        $foto->move($ruta, $nombrefoto);
        $medico->foto = $nombrefoto;
    }

    // If id_medico is an auto-incrementing primary key, you can omit it from the insert statement
    // $medico->id_medico = ...;

    $medico->save();
    return redirect()->route('medico.index');
}
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        return view("almacen.medico.show", compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view("almacen.medico.edit", compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicoFormRequest $request, $id)
    {
        $medico = Medico::findOrFail($id);
        $medico->nombre = $request->get('nombre');
        $medico->especialidad = $request->get('especialidad');
        $medico->aniosservicio = $request->get('aniosservicio');
       

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombrefoto = Str::slug($request->get('nombre')) . '.' . $foto->getClientOriginalExtension();
            $ruta = public_path("/imagenes/medico/");
            
            $foto->move($ruta, $nombrefoto);
            $medico->foto = $nombrefoto;
        }

        $medico->save();
        return redirect()->route('medico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete(); // Considerar usar delete() para eliminar físicamente el registro
        return redirect()->route('medico.index');
    }
}
