<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Phone;
use PhpOffice\PhpSpreadsheet\Cell;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PhoneExport implements WithMapping, WithHeadings, WithColumnFormatting, FromCollection, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($sys, $count)
    {
        $this->sys = $sys;
        $this->count = $count;
    }

    public function collection()
    {
        return Phone::where('system', $this->sys)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->take($this->count)->get();
    }

    public function headings(): array
    {
        return [
            'number',
            'pre',
            'name',
            'after',
            'done',
            'use'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,
        ];
    }

    public function map($row): array
    {
        return [
            $row->phone,
            '',
            '',
            '',
            '',
            ''
        ];
    }

    public function prepareRows($rows)
    {
        return collect($rows)->transform(function ($row) {
            $ptn = "/^0/";  // Regex
            $rpltxt = "98";  // Replacement string
            $row->phone =  preg_replace($ptn, $rpltxt, $row->phone);
            return $row;
        });
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER
        ];
    }
}
