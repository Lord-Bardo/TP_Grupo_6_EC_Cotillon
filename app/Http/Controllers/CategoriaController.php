<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function exportPDF() {
        $categorias = Categoria::all();

        // Crear una instancia de mPDF
        $mpdf = new Mpdf();

        // Contenido HTML para el PDF
        $html = view("admin.categorias-export-pdf", ['categorias' => $categorias])->render();

        // Escribir el contenido HTML al PDF
        $mpdf->WriteHTML($html);

        // Salida: Descargar el archivo como "listado_categorias.pdf"
        $mpdf->Output("listado_categorias.pdf", \Mpdf\Output\Destination::DOWNLOAD);
    }

    public function exportCSV() {
        $categorias = Categoria::all();

        // Crear el contenido del CSV
        $callback = function () use ($categorias) {
            // Abrir un stream de salida para escribir el CSV
            $file = fopen('php://output', 'w');

            // Escribir la primera fila (encabezados)
            fputcsv($file, mb_convert_encoding(['Nombre', 'Descripción'], 'UTF-16', 'auto'), ';');

            // Escribir los datos de cada categoria
            foreach ($categorias as $categoria) {
                $row = [
                    $categoria->nombre_categoria,
                    $categoria->descripcion_categoria
                ];

                // Convierto los caracteres a UTF-8
                fputcsv($file, mb_convert_encoding($row, 'UTF-16', 'auto'), ';');
            }

            // Cerrar el archivo
            fclose($file);
        };

        // Nombre del archivo CSV
        $fileName = "categorias.csv";

        // Configurar los encabezados para descarga
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            "Content-Disposition" => "attachment; filename=$fileName",
        ];

        // Retornar la respuesta con el archivo CSV
        return response()->stream($callback, 200, $headers);
    }

    /* 
    public function exportExcel() {
        // Obtener los datos de la base de datos
        $categorias = Categoria::all();
    
        // Crear una nueva hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Encabezados de las columnas
        $headers = ['Nombre', 'Descripción'];
    
        // Escribir los encabezados en la primera fila
        foreach ($headers as $index => $header) {
            $sheet->setCellValue(chr(65 + $index) . '1', $header);  // Usar A1, B1, C1, etc.
        }
    
        // Escribir los datos
        $row = 2; // Comenzamos desde la fila 2
        foreach ($categorias as $categoria) {
            $sheet->setCellValue('A' . $row, $categoria->nombre_categoria); // Columna A
            $sheet->setCellValue('B' . $row, $categoria->descripcion_categoria); // Columna B
            $row++;
        }
    
        // Crear un escritor para el archivo Excel
        $writer = new Xlsx($spreadsheet);
    
        // Nombre del archivo Excel
        $fileName = "listado_categorias.xlsx";
    
        // Crear un archivo temporal en disco
        $tempFilePath = storage_path('app/public/listado_categorias.xlsx');
    
        // Guardar el contenido del archivo temporal
        $writer->save($tempFilePath);
    
        // Enviar el archivo como respuesta para descargar
        return response()->download($tempFilePath)->deleteFileAfterSend(true);
    }
        */
}
