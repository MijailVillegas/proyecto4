<?php

namespace App\Exports;

use DB;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Detalle_Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class VentaExport implements FromCollection,WithHeadings,ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function registerEvents(): array
    {
        $bold =[
            'font' =>[
                'bold' => true,
            ],
        ];
        $BORDER_THICK =[
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THICK //Bordes Delgados
                ]
            ]
        ];
        $BORDER_THIN =[
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN //Bordes Delgados
                ]
            ]
        ];

        return [
            // Handle by a closure.
                      
            BeforeSheet::class => function(BeforeSheet $event) use ($bold,$BORDER_THICK) {
                $event->sheet->setCellValue('A1', 'Usuario:');
                $event->sheet->setCellValue('B1', 'Mijail Villegas Murillo');
            },
            AfterSheet::class => function(AfterSheet $event) use ($bold,$BORDER_THICK,$BORDER_THIN) {
                $event->sheet->insertNewRowBefore(2,1);
                $event->sheet->insertNewColumnBefore('A',2);
                $event->sheet->setCellValue('K4', '=(G4*H4)');
                $event->sheet->getStyle('C1:D1')->applyFromArray(array_merge($bold,$BORDER_THIN));
                $event->sheet->getStyle('C3:K3')->applyFromArray(array_merge($bold,$BORDER_THICK));
                $event->sheet->getStyle('C4:K4')->applyFromArray(array_merge($BORDER_THIN));
                
            },

        ];
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    /*
    public function collection()
    {
        //return Articulo::all();
        return collect(Articulo::getallArticulos());
    }

    public function heading():array{
        return ['id','codigo','descripcion','cantidad','precio'];
    }
    */
    //public function query()
    //{

    //}

    public function collection()
    {
                $request = DB::table('articulos')
        ->join('detalle__ventas', 'detalle__ventas.articulo_id', '=', 'articulos.id')
        ->join('ventas', 'detalle__ventas.venta_id', '=', 'ventas.id')
        ->join('empleados', 'ventas.empleado_id', '=', 'empleados.id')
        ->join('clientes', 'ventas.empleado_id', '=', 'clientes.id')
        ->select(
            'articulos.codigo',
            'clientes.nomcliente',
            'clientes.dniclient',
            'articulos.descripcion',
            'detalle__ventas.cantventa',
            'detalle__ventas.precioventa',
            'ventas.fechventa',
            'empleados.nomempleado'
            )->get();
            return $request;
    }

    public function headings(): array
    {
        return [
            'Codigo','Nombre','C.I.:','Producto', 'Cantidad Vendido', 'Precio de Venta', 'Fecha de Venta', 'Vendedor','Precio Total'
        ];
    }

}
