<?php

namespace App\Http\Controllers;

use App\Models\Am;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class amController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $am = Am::select(['id', 'nama_Am', 'no_Hp_Am', 'email', 'status']);
            return Datatables::of($am)
                ->addColumn('action', function ($am) {
                    return view('datatable._action', [
                        'edit_url' => route('am.edit', $am->id),
                    ]);
                })->make(true);
        }
        if (\Auth::guest() == true) {
            $html = $htmlBuilder
                ->addColumn(['data' => 'nama_Am', 'name' => 'nama_Am', 'title' => 'Nama AM'])
                ->addColumn(['data' => 'no_Hp_Am', 'name' => 'no_Hp_Am', 'title' => 'Nomor HP AM'])
                ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Alamat Email'])
                ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status AM']);
        } else {
            $html = $htmlBuilder
                ->addColumn(['data' => 'nama_Am', 'name' => 'nama_Am', 'title' => 'Nama AM'])
                ->addColumn(['data' => 'no_Hp_Am', 'name' => 'no_Hp_Am', 'title' => 'Nomor HP AM'])
                ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Alamat Email'])
                ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status AM'])
                ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false]);
        }
        return view('am.detailam', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('am.addam');
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
            'nope' => 'required|numeric|digits_between:9,13',
            'email' => 'required|max:50'
        ]);
        am::create([
            'nama_Am' => $request->nama,
            'no_Hp_Am' => $request->nope,
            'email' => $request->email,
            'status' => 'Aktif',
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menambahkan AM :  $request->nama"
        ]);
        return redirect('/am');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $am = Am::findOrFail($id);
        return view('am.editam')->with(compact('am'));
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
            'nope' => 'required|numeric|digits_between:9,12',
            'email' => 'required|max:50',
            'status' => 'required',
        ]);
        $am = Am::find($id);
        $am->update([
            $am->nama_Am = $request->nama,
            $am->no_Hp_Am = $request->nope,
            $am->email = $request->email,
            $am->status = $request->status,
        ]);
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Update Data AM :  $request->nama"
        ]);
        return redirect('/am');
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
