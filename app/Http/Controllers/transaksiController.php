<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\Am;
use App\Models\pelanggan;
use App\Models\layanan;


class transaksiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $am = Am::all(['id', 'nama_Am', 'status'])->where('status', 'like', 'Aktif');
        $layanan = layanan::all(['id', 'nama_Produk']);
        $pelanggan = pelanggan::all(['id', 'nama_Pelanggan']);
        return view('transaksi.addTransaksi', compact('am', 'layanan', 'pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'am' => 'required|max:50',
            'nama' => 'required|max:50',
            'jl' => 'required',
            'status' => 'required',
            'nilai' => 'numeric|required',
        ]);
        transaksi::create([
            'id_Am' => $request->am,
            'id_Pelanggan' => $request->nama,
            'id_Layanan' => $request->jl,
            'nilai' => $request->nilai,
            'status_Projek' => $request->status,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menambahkan Transaksi"
        ]);
        return redirect('/#pr_sec');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = transaksi::where('transaksi.id', '=', $id)->select(['transaksi.id as id', 'ams.id as idam', 'ams.nama_Am as am', 'layanan.id as idla',
            'layanan.nama_Produk as layanan', 'pelanggan.id as idpel',
            'pelanggan.nama_Pelanggan as pelanggan', 'transaksi.tgl_Kfs', 'transaksi.tgl_Baso', 'transaksi.tgl_Kontrak',
            'transaksi.status_Projek', 'transaksi.nilai'])
            ->join('ams', 'transaksi.id_AM', '=', 'ams.id')
            ->join('layanan', 'transaksi.id_Layanan', '=', 'layanan.id')
            ->join('pelanggan', 'transaksi.id_Pelanggan', '=', 'pelanggan.id')->get();
        $am = Am::all(['id as idam', 'nama_Am as namam', 'status'])->where('status', 'like', 'Aktif');
        $layanan = layanan::all(['id as idla', 'nama_Produk as nampro']);
        $pelanggan = pelanggan::all(['id as idpel', 'nama_Pelanggan as nampel']);
        return view('transaksi.editTransaksi', compact('transaksi', 'am', 'layanan', 'pelanggan'));
//        return dd($transaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'am' => 'required',
            'pelanggan' => 'required',
            'jl' => 'required',
            'kfs' => 'required',
            'baso' => 'required',
            'kontrak' => 'required',
            'sp' => 'required',
            'nilai' => 'numeric|required',
        ]);
        $transaksi = transaksi::findOrFail($id);
        $transaksi->update([
            $transaksi->id_Am = $request->am,
            $transaksi->id_Pelanggan = $request->pelanggan,
            $transaksi->id_Layanan = $request->jl,
            $transaksi->tgl_Kfs = $request->kfs,
            $transaksi->tgl_Baso = $request->baso,
            $transaksi->tgl_Kontrak = $request->kontrak,
            $transaksi->status_Projek = $request->sp,
            $transaksi->nilai = $request->nilai,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Update Data Transaksi!"
        ]);
        return redirect('/#pr_sec');
//        return dd($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
