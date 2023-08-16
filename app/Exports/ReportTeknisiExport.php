<?php

namespace App\Exports;


use App\Tiket;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportTeknisiExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    use Exportable;
    public $from, $to;
    public function __construct($from, $to){
        $this->from = $from;
        $this->to = $to;
    }
    public function query()
    {
        return Tiket::query()
            ->groupBy('id_teknisi')
            ->selectRaw('karyawans.nama as nama,karyawans.nik as nik,
                count(CASE WHEN tikets.status = 0 THEN 1 END) as sukses,
                count(CASE WHEN tikets.status = 3 THEN 1 END) as waiting,
                count(CASE WHEN tikets.status = 4 THEN 1 END) as onprogress,
                count(CASE WHEN tikets.status = 5 THEN 1 END) as reject,
                sum(ratings.rating) / count(id_ticket) as rating')
            ->join('ratings','ratings.id_ticket','=','tikets.idTiket')
            ->join('karyawans','karyawans.nik','=','tikets.id_teknisi')
            ->where('tikets.created_at', '>=', $this->from)
            ->where('tikets.created_at', '<=', $this->to);
        // return Invoice::query();
    }
    public function headings(): array
    {
        return [
            'name',
            'nik',
            'sukses',
            'waiting',
            'onprogress',
            'reject',
            'nilai',
        ];
    }
}
