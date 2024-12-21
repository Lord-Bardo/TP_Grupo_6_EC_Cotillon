<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productos = Producto::paginate(3);

        return view('welcome', [
            'productos' => $productos,
        ]);
    }
    
    public function admin_productos_index()
    {
        $productos = Producto::all();

        return view('admin.abm-productos', [
            'productos' => $productos,
        ]);
    }
    
    // Deprecated
    public function productosPorCategoria($id)
    {

        $productos = Producto::where('id_categoria', $id)->paginate(6);

        $categoria = Categoria::findOrFail($id);


        return view('productos-filtrados', [
            'productos' => $productos,
            'categoria' => $categoria,
        ]);
    }

    public function search(Request $request)
    {
        $producto = $request->input('producto');

        if ($producto) {
            $productos = Producto::where('nombre_producto', 'like', "%$producto%")->paginate(3);

            if ($productos->isEmpty()) {
                $productos = Producto::paginate(3);
            }
        } else {
            /* Si no se puso nada en la busqueda */
            $productos = Producto::paginate(3);
        }

        return view('welcome', [
            'productos' => $productos,
        ]);
    }

    public function create() {
        $categorias = Categoria::all();

        return view('admin.store-producto', compact('categorias')); //admin/store-producto es la vista en la carpeta de views
    }

    public function store(Request $request) {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion_producto' => 'required|string',
            'precio' => 'required',
            'stock' => 'required',
            'estado' => 'required',
            'id_categoria' => 'required|integer', // Cambiado a id_categoria
        ]);
    
        $categoria = Categoria::find($request->id_categoria);

        if (!$categoria) {
            return redirect()->back()->with('warning', 'La categoría seleccionada no existe.');
        }
    
        Producto::create([
            'nombre_producto' => $request->nombre_producto,
            'descripcion_producto' => $request->descripcion_producto,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'id_categoria' => $categoria->id_categoria,
        ]);
    
        return redirect()->route('admin.productos')->with('success', 'Producto agregado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        $producto = Producto::findOrFail($id_producto); 
        $producto->delete(); 

        return redirect()->route('admin.productos')->with('success', 'Producto eliminado con éxito.');
    }
}
