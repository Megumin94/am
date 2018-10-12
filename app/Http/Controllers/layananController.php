<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class layananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $layanan = layanan::all();
            return Datatables::of($layanan)
                ->addColumn('action', function ($layanan) {
                    return view('datatable._action', [
                        'edit_url' => route('layanan.edit', $layanan->id),
                    ]);
                })->make(true);
        }
        if (\Auth::guest() == true) {
            $html = $htmlBuilder
                ->addColumn(['data' => 'nama_Produk', 'name' => 'nama_Produk', 'title' => 'Nama Produk'])
                ->addColumn(['data' => 'daerah_Instalasi', 'name' => 'daerah_Instalasi', 'title' => 'Daerah Instalasi'])
                ->addColumn(['data' => 'satuan_Quantity', 'name' => 'satuan_Quantity', 'title' => 'Satuan Quantity'])
                ->addColumn(['data' => 'nominal_Harga', 'name' => 'nominal_Harga', 'title' => 'Harga'])
                ->addColumn(['data' => 'payterm', 'name' => 'payterm', 'title' => 'Payterm'])
                ->addColumn(['data' => 'abonemen', 'name' => 'abonemen', 'title' => 'Abonemen'])
                ->addColumn(['data' => 'akhir_Kontrak', 'name' => 'akhir_Kontrak', 'title' => 'Akhir Kontrak'])
                ->addColumn(['data' => 'biaya', 'name' => 'biaya', 'title' => 'Biaya'])
                ->addColumn(['data' => 'mitra', 'name' => 'mitra', 'title' => 'Mitra']);
        } else {
            $html = $htmlBuilder
                ->addColumn(['data' => 'nama_Produk', 'name' => 'nama_Produk', 'title' => 'Nama Produk'])
                ->addColumn(['data' => 'daerah_Instalasi', 'name' => 'daerah_Instalasi', 'title' => 'Daerah Instalasi'])
                ->addColumn(['data' => 'satuan_Quantity', 'name' => 'satuan_Quantity', 'title' => 'Satuan Quantity'])
                ->addColumn(['data' => 'nominal_Harga', 'name' => 'nominal_Harga', 'title' => 'Harga'])
                ->addColumn(['data' => 'payterm', 'name' => 'payterm', 'title' => 'Payterm'])
                ->addColumn(['data' => 'abonemen', 'name' => 'abonemen', 'title' => 'Abonemen'])
                ->addColumn(['data' => 'akhir_Kontrak', 'name' => 'akhir_Kontrak', 'title' => 'Akhir Kontrak'])
                ->addColumn(['data' => 'biaya', 'name' => 'biaya', 'title' => 'Biaya'])
                ->addColumn(['data' => 'mitra', 'name' => 'mitra', 'title' => 'Mitra'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
        }
        return view('layanan.listLayanan', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.addLayanan');
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
            'layanan' => 'required|max:50',
            'instalasi' => 'required|max:50',
            'quantity' => 'required',
            'harga' => 'required|numeric|digits_between:1,10',
            'term' => 'required',
            'abonemen' => 'numeric|digits_between:1,10',
            'kontrak' => 'required',
            'biaya' => 'required|numeric|digits_between:1,10',
            'mitra' => 'required|max:50',
        ]);
        layanan::create([
            'nama_Produk' => $request->layanan,
            'daerah_Instalasi' => $request->instalasi,
            'satuan_Quantity' => $request->quantity,
            'nominal_Harga' => $request->harga,
            'payterm' => $request->term,
            'abonemen' => $request->abonemen,
            'akhir_Kontrak' => $request->kontrak,
            'biaya' => $request->biaya,
            'mitra' => $request->mitra,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menambahkan Layanan :  $request->layanan"
        ]);
        return redirect('/admin/layanan');
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
        $layanan = layanan::findOrFail($id);
        return view('layanan.editlayanan')->with(compact('layanan'));
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
            'layanan' => 'required|max:50',
            'instalasi' => 'required|max:50',
            'quantity' => 'required',
            'harga' => 'required|numeric|digits_between:1,10',
            'term' => 'required',
            'abonemen' => 'numeric|digits_between:1,10',
            'kontrak' => 'required',
            'biaya' => 'required|numeric|digits_between:1,10',
            'mitra' => 'required|max:50',
        ]);
        $layanan = layanan::find($id);
        $layanan->update([
            $layanan->nama_produk = $request->layanan,
            $layanan->daerah_Instalasi = $request->instalasi,
            $layanan->satuan_Quantity = $request->quantity,
            $layanan->nominal_Harga = $request->harga,
            $layanan->payterm = $request->term,
            $layanan->abonemen = $request->abonemen,
            $layanan->akhir_Kontrak = $request->kontrak,
            $layanan->biaya = $request->biaya,
            $layanan->mitra = $request->mitra,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Update Data Layanan :  $request->layanan"
        ]);
        return redirect('/admin/layanan');
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
