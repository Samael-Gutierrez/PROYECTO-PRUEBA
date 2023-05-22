<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Validation\Rule;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $items = Editorial::select('editorials.id_e', 'editorials.nombre_e', 'editorials.activo')
            ->orderBy('nombre_e', 'asc')
            ->where('editorials.nombre_e', 'LIKE', "%$request->q%")
            ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('Editoriales.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Editoriales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'nombre_e'=>'required|unique:editorials|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        'activo'=>'required'
        ]);

        $editoriales = new Editorial;
        $editoriales->nombre_e = $request->nombre_e;
        $editoriales->activo = $request->activo;
        $editoriales->save();

        return redirect()->route('editoriales.index')
        ->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function show(Editorial $editorial)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
   public function edit(Editorial $autor)
    {
        dd($autor);
          return view('Editoriales.edit', compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editorial $editorial)
    {
         $this->validate($request,[
        'nombre_e' => ['required', 'regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/', Rule::unique('editorials')->ignore($editorial->nombre_e, 'nombre_e')],
        'activo'=>'required',
        ]);

         $editorial= Editorial::find($editorial->id_e);
         $editorial->nombre_e= $request->nombre_e;
         $editorial->activo = $request->activo;
         $editorial->save();

         return redirect()->route('editoriales.index')
         ->with('message', 'Registro modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editorial $editorial)
    {
        $buscaeditorial = Libro::where('id_e',$item->id_e)->get();
        $cuantos = count($buscaeditorial);
         if($cuantos==0)
        {
        $item->forceDelete();
        return redirect()->route('editoriales.index')->with('message',"Registro eliminado exitosamente");
        } else {
        return redirect()->route('editoriales.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Libros");
        }
    }

    public function toggleStatus(Request $request, Editorial $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('editoriales.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('editoriales.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
