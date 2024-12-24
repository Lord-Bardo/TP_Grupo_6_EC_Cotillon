<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Barryvdh\DomPDF\Facade as PDF;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductoController extends Controller
{   
    /* ESTO A MI NO ME FUNCIONA, PERO MATI LO TIENE OK 
    public function exportExcel() {
        // Obtener los datos de la base de datos
        $productos = Producto::all();
    
        // Crear una nueva hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Encabezados de las columnas
        $headers = ['Nombre', 'Descripción', 'Precio', 'Stock'];
    
        // Escribir los encabezados en la primera fila
        foreach ($headers as $index => $header) {
            $sheet->setCellValue(chr(65 + $index) . '1', $header);  // Usar A1, B1, C1, etc.
        }
    
        // Escribir los datos
        $row = 2; // Comenzamos desde la fila 2
        foreach ($productos as $producto) {
            $sheet->setCellValue('A' . $row, $producto->nombre_producto); // Columna A
            $sheet->setCellValue('B' . $row, $producto->descripcion_producto); // Columna B
            $sheet->setCellValue('C' . $row, $producto->precio); // Columna C
            $sheet->setCellValue('D' . $row, $producto->stock); // Columna D
            $row++;
        }
    
        // Crear un escritor para el archivo Excel
        $writer = new Xlsx($spreadsheet);
    
        // Nombre del archivo Excel
        $fileName = "listado_productos.xlsx";
    
        // Crear un archivo temporal en disco
        $tempFilePath = storage_path('app/public/listado_productos.xlsx');
    
        // Guardar el contenido del archivo temporal
        $writer->save($tempFilePath);
    
        // Enviar el archivo como respuesta para descargar
        return response()->download($tempFilePath)->deleteFileAfterSend(true);
    }
    */
    
    public function exportPDF() {
        $productos = Producto::all();

        // Crear una instancia de mPDF
        $mpdf = new Mpdf();

        // Contenido HTML para el PDF
        $html = view("admin.productos-export-pdf", ['productos' => $productos])->render();

        // Escribir el contenido HTML al PDF
        $mpdf->WriteHTML($html);

        // Salida: Descargar el archivo como "mi_documento.pdf"
        $mpdf->Output("listado_productos.pdf", \Mpdf\Output\Destination::DOWNLOAD);
    }

    public function exportCSV() {
        $productos = Producto::all();

        // Crear el contenido del CSV
        $callback = function () use ($productos) {
            // Abrir un stream de salida para escribir el CSV
            $file = fopen('php://output', 'w');

            // Escribir la primera fila (encabezados)
            fputcsv($file, mb_convert_encoding(['Nombre', 'Descripción', 'Precio', 'Stock'], 'UTF-16', 'auto'), ';');

            // Escribir los datos de cada producto
            foreach ($productos as $producto) {
                $row = [
                    $producto->nombre_producto,
                    $producto->descripcion_producto,
                    $producto->precio,
                    $producto->stock,
                ];

                // Convierto los caracteres a UTF-8
                fputcsv($file, mb_convert_encoding($row, 'UTF-16', 'auto'), ';');
            }

            // Cerrar el archivo
            fclose($file);
        };

        // Nombre del archivo CSV
        $fileName = "productos.csv";

        // Configurar los encabezados para descarga
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            "Content-Disposition" => "attachment; filename=$fileName",
        ];

        // Retornar la respuesta con el archivo CSV
        return response()->stream($callback, 200, $headers);
    }

    
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
        $datos = $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion_producto' => 'required|string|max:255',
            'precio' => 'required',
            'stock' => 'required',
            'estado' => 'required',
            'id_categoria' => 'required|integer', // Cambiado a id_categoria
        ], [
            "required" => "Este campo es obligatorio!",
            "nombre_producto.max" => "La cantidad máxima de caracteres son 100!",
            "descripcion_producto.max" => "La cantidad máxima de caracteres son 255!"
        ]);
    
        $categoria = Categoria::find($request->id_categoria);

        if (!$categoria) {
            return redirect()->back()->with('warning', 'La categoría seleccionada no existe.');
        }
    
        Producto::create($datos);
    
        return redirect()->route('admin.productos')->with('success', 'Producto agregado exitosamente.');
    }
    
    public function edit($id_producto) {
        $producto = Producto::findOrFail($id_producto);
        $categorias = Categoria::all();
    
        return view('admin.edit-producto', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id_producto) {
        
        $producto = Producto::findOrFail($id_producto);

        $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion_producto' => 'required|string|max:255',
            'precio' => 'required',
            'stock' => 'required',
            'estado' => 'required',
            'id_categoria' => 'required|integer', // Cambiado a id_categoria
        ], [
            "required" => "Este campo es obligatorio!",
            "nombre_producto.max" => "La cantidad máxima de caracteres son 100!",
            "descripcion_producto.max" => "La cantidad máxima de caracteres son 255!"
        ]);

        $categoria = Categoria::find($request->id_categoria);

        if (!$categoria) {
            return redirect()->back()->with('warning', 'La categoría seleccionada no existe.');
        }

        $producto->update([
            'nombre_producto' => $request->nombre_producto,
            'descripcion_producto' => $request->descripcion_producto,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'id_categoria' => $categoria->id_categoria,
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        //$producto = Producto::where('nombre_producto',$nombre_producto)->get();
        return view('producto-ver-mas', ['producto' => $producto]);
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
