<?php

namespace App\Http\Controllers;

use App\Models\Am;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class index extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {

            $transaksi = transaksi::select(['transaksi.id', 'ams.nama_Am as am', 'pelanggan.nama_Pelanggan as pelanggan', 'layanan.nama_Produk as produk',
                'transaksi.tgl_Kfs', 'transaksi.tgl_Baso', 'transaksi.tgl_Kontrak',
                'transaksi.status_Projek', 'transaksi.nilai'])
                ->join('ams', 'transaksi.id_Am', '=', 'ams.id')
                ->join('layanan', 'transaksi.id_Layanan', '=', 'layanan.id')
                ->join('pelanggan', 'transaksi.id_Pelanggan', '=', 'pelanggan.id')->get();
            return Datatables::of($transaksi)
                ->addColumn('action', function ($transaksi) {
                    return view('datatable._action', [
                        'edit_url' => route('transaksi.edit', $transaksi->id),
                    ]);
                })->make(true);
        }
        $ams = Am::select(['nama_Am'])->where('status', 'like', 'Aktif')->get();
        $datas = transaksi::select(\DB::raw('COUNT(id_Am) as jml'))->groupBy('id_Am')->get();
        $am = [];
        $trans = [];
        foreach ($ams as $datam) {
            array_push($am, $datam->nama_Am);
        }
        foreach ($datas as $data) {
            array_push($trans, $data->jml);
        }

        if (\Auth::guest() == true) {
            $html = $htmlBuilder
                ->addColumn(['data' => 'am', 'name' => 'am', 'title' => 'Nama AM'])
                ->addColumn(['data' => 'pelanggan', 'name' => 'pelanggan',
                    'title' => 'Nama Pelanggan'])
                ->addColumn(['data' => 'produk',
                    'name' => 'produk', 'title' => 'Nama Layanan'])
                ->addColumn(['data' => 'tgl_Kfs', 'name' => 'tgl_Kfs',
                    'title' => 'Tanggal KFS'])
                ->addColumn(['data' => 'tgl_Baso', 'name' => 'tgl_Baso',
                    'title' => 'Tanggal BASO'])
                ->addColumn(['data' => 'tgl_Kontrak', 'name' => 'tgl_Kontrak',
                    'title' => 'Tanggal Akhir Kontrak'])
                ->addColumn(['data' => 'status_Projek', 'name' => 'status_Projek',
                    'title' => 'Status'])
                ->addColumn(['data' => 'nilai', 'name' => 'nilai',
                    'title' => 'Nilai']);

        } else {
            $html = $htmlBuilder
                ->addColumn(['data' => 'am', 'name' => 'am', 'title' => 'Nama AM'])
                ->addColumn(['data' => 'pelanggan', 'name' => 'pelanggan',
                    'title' => 'Nama Pelanggan'])
                ->addColumn(['data' => 'produk',
                    'name' => 'produk', 'title' => 'Nama Layanan'])
                ->addColumn(['data' => 'tgl_Kfs', 'name' => 'tgl_Kfs',
                    'title' => 'Tanggal KFS'])
                ->addColumn(['data' => 'tgl_Baso', 'name' => 'tgl_Baso',
                    'title' => 'Tanggal BASO'])
                ->addColumn(['data' => 'tgl_Kontrak', 'name' => 'tgl_Kontrak',
                    'title' => 'Tanggal Akhir Kontrak'])
                ->addColumn(['data' => 'status_Projek', 'name' => 'status_Projek',
                    'title' => 'Status'])
                ->addColumn(['data' => 'nilai', 'name' => 'nilai',
                    'title' => 'Nilai'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
        }

        return view('index', compact('html', 'am', 'trans'));
//        return dd($am, $trans);
    }
}
