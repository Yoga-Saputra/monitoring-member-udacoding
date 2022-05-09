<?php

namespace App\Exports;

use App\Grade;
use App\Participant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ParticipantExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithStyles
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $peserta = Participant::join('programs', "programs.id", "=", "participants.program_id")->select('participants.id', 'name', 'email', 'no_tlp', 'sekolah', 'angkatan', 'programs.nama_program')->orderBy('participants.id', 'Desc')->get();
        // dd($peserta);
        return $peserta;
    }
    public function headings(): array
    {
        return [
            'id',
            'Nama Peserta',
            'Email',
            'No Tlp',
            'Sekolah',
            'Angkatn',
            'Program'
        ];
    }
    public function registerEvents(): array
    {

        //border style
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    //'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];

        //font style
        $styleArray1 = [
            'font' => [
                'bold' => true,
            ]
        ];

        //column  text alignment
        $styleArray2 = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            )
        );
        //$styleArray3 used for vertical alignment
        $styleArray3 = array(
            'alignment' => array(
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            )
        );
        $styleArray4 = array(
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ]
            ]
        );
        return [
            AfterSheet::class => function (AfterSheet $event) use (
                $styleArray,
                $styleArray1,
                $styleArray2,
                $styleArray3,
                $styleArray4
            ) {
                $cellRange = 'A1:F1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);


                //Heading formatting...
                $event->getSheet()->getDelegate()->getStyle('A1:F1')->applyFromArray($styleArray);


                //column width set
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(65);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(64);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(11);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);


                //D & E column width set to 17
                $columns = ['D', 'E'];
                foreach ($columns as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setWidth(17);
                }

                //D1 & E1 text wrapping...
                $event->sheet->getStyle('D1')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('E1')->getAlignment()->setWrapText(true);

                //text center columns...
                $event->sheet->getStyle('C1')->applyFromArray($styleArray2);
                $event->sheet->getStyle('D1')->applyFromArray($styleArray2);
                $event->sheet->getStyle('E1')->applyFromArray($styleArray2);
                $event->sheet->getStyle('B1')->applyFromArray($styleArray2);
                $event->sheet->getStyle('F1')->applyFromArray($styleArray2);


                $event->sheet->getStyle('A1:F1')->applyFromArray($styleArray3);
                //sums color formatting...
                $event->sheet->getStyle('A1:F1')->applyFromArray($styleArray4);
                //$row->setBackground('#CCCCCC');
            },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1',)->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
    }
}
