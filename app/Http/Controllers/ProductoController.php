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


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
