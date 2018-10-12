<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelanggan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;


class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $pelanggan = pelanggan::select(['id', 'nama_Pelanggan', 'no_Hp', 'nama_Cp', 'no_Telepon', 'alamat_Pelanggan']);
            return DataTables::of($pelanggan)
                ->addColumn('action', function ($pelanggan) {
                    return view('datatable._action', [
                        'edit_url' => route('pelanggan.edit', $pelanggan->id),
                    ]);
                })->make(true);
        }
        if (\Auth::guest() == true) {
            $html = $htmlBuilder
                ->addColumn(['data' => 'nama_Pelanggan', 'name' => 'nama_Pelanggan', 'title' => 'Nama Pelanggan'])
                ->addColumn(['data' => 'nama_Cp', 'name' => 'nama_Cp', 'title' => 'Contact Person'])
                ->addColumn(['data' => 'no_Hp', 'name' => 'no_Hp', 'title' => 'Nomor HP'])
                ->addColumn(['data' => 'no_Telepon', 'name' => 'no_Telepon', 'title' => 'Nomor Telepon'])
                ->addColumn(['data' => 'alamat_Pelanggan', 'name' => 'alamat_Pelanggan', 'title' => 'Alamat Pelanggan']);
        } else {
            $html = $htmlBuilder
                ->addColumn(['data' => 'nama_Pelanggan', 'name' => 'nama_Pelanggan', 'title' => 'Nama Pelanggan'])
                ->addColumn(['data' => 'nama_Cp', 'name' => 'nama_Cp', 'title' => 'Contact Person'])
                ->addColumn(['data' => 'no_Hp', 'name' => 'no_Hp', 'title' => 'Nomor HP'])
                ->addColumn(['data' => 'no_Telepon', 'name' => 'no_Telepon', 'title' => 'Nomor Telepon'])
                ->addColumn(['data' => 'alamat_Pelanggan', 'name' => 'alamat_Pelanggan', 'title' => 'Alamat Pelanggan'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);

        }
        return view('pelanggan.detailPelanggan', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.addPelanggan');
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
            'nama' => 'required|max:50',
            'cp' => 'max:50',
            'nope' => 'required|numeric|digits_between:9,13',
            'tlp' => 'numeric|digits_between:6,12',
            'alamat' => 'required|max:100',
        ]);
        pelanggan::create([
            'nama_Pelanggan' => $request->nama,
            'nama_Cp' => $request->cp,
            'no_Hp' => $request->nope,
            'no_Telepon' => $request->tlp,
            'alamat_Pelanggan' => $request->alamat,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menambahkan Pelanggan :  $request->nama"
        ]);
        return redirect('/pelanggan');
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
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggan.editPelanggan', compact('pelanggan'));

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
            'nama' => 'required|max:50',
            'cp' => 'max:50',
            'nope' => 'required|numeric|digits_between:9,13',
            'tlp' => 'numeric|digits_between:6,12',
            'alamat' => 'required|max:100',
        ]);
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama_Pelanggan' => $request->nama,
            'nama_Cp' => $request->cp,
            'no_Hp' => $request->nope,
            'no_Telepon' => $request->tlp,
            'alamat_Pelanggan' => $request->alamat,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit Pelanggan :  $request->nama"
        ]);
        return redirect('/pelanggan');
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
