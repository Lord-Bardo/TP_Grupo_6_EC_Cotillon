<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_cat()
    {
        $categorias = Categoria::paginate(6);

        $parametros = [
            "categorias" => $categorias
        ];
        
        return view('categorias', $parametros);
    }

    public function adminIndex()
    {
        $categorias = Categoria::all(); 
        return view('admin.abm-categorias', compact('categorias'));
    }

    public function destroy($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);

        // Verificar si hay productos asociados
        if ($categoria->productos()->exists()) {
            return redirect()->route('admin.categorias')
                ->with('warning', 'No se puede eliminar la categoría porque está asociada a productos.');
        }

        // Si no hay productos asociados, elimina la categoría
        $categoria->delete();

        return redirect()->route('admin.categorias')
            ->with('success', 'Categoría eliminada correctamente.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Esto solo retorna la vista */
    public function create()
    {
        return view('admin.store-categoria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
            'descripcion_categoria' => 'required|string',
        ]);

        
        Categoria::create([
            'nombre_categoria' => $request->nombre_categoria,
            'descripcion_categoria' => $request->descripcion_categoria,
        ]);

        return redirect()->route('admin.categorias')->with('success', 'Categoría agregada exitosamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function edit($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria); 
        return view('admin.edit-categoria', compact('categoria')); 
    }

    public function update(Request $request, $id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);

        // Validaciones basicas, despues toca agregar mas
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
            'descripcion_categoria' => 'required|string',
        ]);

        // Actualizar la categoría
        $categoria->update([
            'nombre_categoria' => $request->nombre_categoria,
            'descripcion_categoria' => $request->descripcion_categoria,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.categorias')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
