<?php

namespace App\Exports;

use App\Models\Articulo;
/*
En caso de usar con vistas

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

*/

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpSpreadsheet\Style\Alignment as StyleAlignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ArticuloExport implements FromQuery,WithHeadings,ShouldAutoSize, WithEvents
{

    //use Exportable;
    public function exportPDF()
    {
        $articulos = Articulo::all();
        $pdf = PDF::loadView('export\articulos', compact('articulos'));

        return $pdf->stream('clientes-report' . date("Y-m-d") . '.pdf');
    }

    public function registerEvents(): array
    {
        $evenRown=[
            'fill'=>[
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'fc1303'
                ]
            ]
        ];

        $tableHead=[
            'font'=>[
                'color' =>[
                    'rgb'=> 'ffffff'
                ],
                'bold'=> true,
                'size'=>14
                ],
                'fill'=>[
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => 'fc1303'
                    ]
                ]
                ];
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
                      
            BeforeSheet::class => function(BeforeSheet $event) use ($evenRown,$bold,$BORDER_THICK,$tableHead,$BORDER_THIN) {
                $event->sheet->setCellValue('A1', 'Reporte de ventas');
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->getStyle('A1:D1')->applyFromArray(array_merge($BORDER_THICK));
                $event->sheet->getStyle('A1:D1')->getFont()->setSize(20);
                $event->sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(StyleAlignment::HORIZONTAL_CENTER);
                $event->sheet->setCellValue('A2', 'Nombre: ');
                $event->sheet->setCellValue('B2', 'Mijail Villegas Murillo');  
                $event->sheet->setCellValue('A3', 'Correo: ');
                $event->sheet->setCellValue('B3', 'mfavilegas@gmail.com'); 
                $event->sheet->getStyle('A2:A3')->applyFromArray(array_merge($bold));
                $event->sheet->getStyle('A2:B3')->applyFromArray(array_merge($BORDER_THIN));
            },
            AfterSheet::class => function(AfterSheet $event) use ($evenRown,$bold,$BORDER_THICK,$BORDER_THIN,$tableHead) {
                $event->sheet->insertNewRowBefore(2,1);
                $event->sheet->setAutoFilter('A5:D5');
                $event->sheet->getStyle('A5:D5')->applyFromArray(array_merge($bold));
                $event->sheet->getStyle('A5:D5')->applyFromArray(array_merge($tableHead));
                $event->sheet->getStyle('A5:D5')->applyFromArray(array_merge($bold,$BORDER_THICK));
                $event->sheet->insertNewColumnBefore('A',1);
                $event->sheet->getColumnDimension('A')->setWidth(4);
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
    public function query()
    {
        return Articulo::select('codigo','descripcion','cantidad','precio');
    }

    public function headings(): array
    {
        return [
            'Código',
            'Descripción',
            'Cantidad',
            'Precio',
        ];
    }

    /*
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    */
    /*
    public function map($articulo): array
    {
        return [

        ];
    }
    */

    /*
    En caso de usar desde vistas

    public function view(): View{
       return view('export.articulos', [
           'articulos' => Articulo::get()
       ]);
    */
}
