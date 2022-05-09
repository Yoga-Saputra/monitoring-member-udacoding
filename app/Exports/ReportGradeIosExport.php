<?php

namespace App\Exports;

use App\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportGradeIosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithStyles
{
    use Importable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $grade =  Grade::join('participants', "participants.id", "=", "grades.participant_id")->join('programs', "programs.id", "=", "participants.program_id")->selectRaw('participants.name, participants.sekolah,programs.nama_program, participants.angkatan, IFNULL(exam_1,0) + IFNULL(submission_1,0) + IFNULL(submission_2,0) + IFNULL(submission_3,0) + IFNULL(exam_2,0) + IFNULL(submission_4,0) + IFNULL(submission_5,0) + IFNULL(submission_6,0) + IFNULL(exam_3,0) + IFNULL(submission_7,0) + IFNULL(submission_8,0) + IFNULL(submission_9,0) + IFNULL(exam_4,0) + IFNULL(submission_10,0) + IFNULL(submission_11,0) + IFNULL(submission_12,0) + IFNULL(exam_5,0) + IFNULL(submission_13,0) + IFNULL(submission_14,0) + IFNULL(submission_15,0) + IFNULL(exam_6,0) + IFNULL(submission_16,0) + IFNULL(submission_17,0) + IFNULL(submission_18,0) + IFNULL(exam_7,0) + IFNULL(submission_19,0) + IFNULL(submission_20,0) + IFNULL(submission_21,0) + IFNULL(exam_8,0) + IFNULL(submission_22,0) + IFNULL(submission_23,0) + IFNULL(submission_24,0) + IFNULL(exam_9,0) + IFNULL(submission_25,0) + IFNULL(submission_26,0) + IFNULL(submission_27,0) + IFNULL(exam_10,0) + IFNULL(submission_28,0) + IFNULL(submission_29,0) + IFNULL(submission_30,0) + IFNULL(exam_11,0) + IFNULL(submission_31,0) + IFNULL(submission_32,0) + IFNULL(submission_33,0) + IFNULL(exam_12,0) + IFNULL(submission_34,0) + IFNULL(submission_35,0) + IFNULL(submission_36,0) as total_grade')->orderby('total_grade', 'desc')->where("participants.program_id", 3)->get();
        // dd($grade);
        return $grade;
    }
    public function headings(): array
    {
        return [
            'Peserta',
            'Sekolah',
            'Program',
            'Angkatan',
            'Total Grade',
        ];
    }
    // public function registerEvents(): array
    // {
    //     $styleArray = [
    //         'borders' => [
    //             'outline' => [
    //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 //'color' => ['argb' => 'FFFF0000'],
    //             ],
    //         ],
    //     ];
    //     return [
    //         AfterSheet::class    => function (AfterSheet $event) use ($styleArray) {
    //             $cellRange = 'A1:E1'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //         },
    //     ];
    // }
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
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);


                //Heading formatting...
                $event->getSheet()->getDelegate()->getStyle('A1:E1')->applyFromArray($styleArray);


                //column width set
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(65);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(64);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(11);


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


                $event->sheet->getStyle('A1:E1')->applyFromArray($styleArray3);
                //sums color formatting...
                $event->sheet->getStyle('A1:E1')->applyFromArray($styleArray4);
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
    }
}
