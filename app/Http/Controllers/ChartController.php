<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Detalle_Venta;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
class ChartController extends Controller
{
    public function exportPDF(Request $request)
    {
        $data = $request->hidden_html;
        $articulos = Articulo::all();
        $pdf = PDF::loadView('export\articulos', compact('articulos', 'data'));
        return $pdf->stream('articulos-report.pdf');
    }
}
