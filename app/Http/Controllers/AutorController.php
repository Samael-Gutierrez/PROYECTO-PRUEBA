<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $items = Autor::select('autors.id_a', 'autors.nombre_a', 'autors.nacionalidad_a',
            'autors.fecha_n', 'autors.fecha_d', 'autors.activo')
            ->where('autors.nombre_a', 'LIKE', "%$request->q%")
            ->orderBy('id_a', 'desc')
            ->paginate( ($request->paginate) ? $request->paginate : 10 );
          return view('Autores.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Autores.create');
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
            'nombre_a'           =>'required|unique:autors|max:40|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'nacionalidad_a'     =>'required|max:40|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'fecha_n'            =>'required|date',
            'activo'             =>'required'
        ]);

            $autores = new Autor;
            $autores->nombre_a= $request->nombre_a;
            $autores->nacionalidad_a= $request->nacionalidad_a;
            $autores->fecha_n= $request->fecha_n;
            $autores->fecha_d= $request->fecha_d;
            $autores->activo = $request->activo;

            $autores->save();
            return redirect()->route('autores.index')
                ->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
       return view('Autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $this->validate($request,[
            'nombre_a' => ['required', 'max:40', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('autors')->ignore($autor->nombre_a, 'nombre_a')],
            'nacionalidad_a'=>'required',
            'fecha_n'=>'required|date',
            'activo'=>'required',
        ]);

         $autores= Autor::find($autor->id_a);
         $autores->nombre_a= $request->nombre_a;
         $autores->nacionalidad_a= $request->nacionalidad_a;
         $autores->fecha_n= $request->fecha_n;
         $autores->fecha_d= $request->fecha_d;
         $autores->activo = $request->activo;
         $autores->save();

         return redirect()->route('autores.index')
         ->with('message', 'Registro modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
       $buscaautor = Libro::where('id_a',$item->id_a)->get();
       $cuantos = count($buscaautor);
        
        if($cuantos==0)
        {
        $autor->forceDelete();
        return redirect()->route('autores.index')->with('message',"Registro eliminado exitosamente");
        }  else {
        return redirect()->route('autores.index')->with('message',"El registro no se puede eliminar ya que tiene registros en Libros");
        }
    }

     public function toggleStatus(Request $request, Autor $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('autores.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('autores.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
