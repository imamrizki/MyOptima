<?php

namespace App\Http\Controllers;

use App\Models\Tematik;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function pagePermintaan()
    {
        $permintaan = Permintaan::with(['tematik'])->paginate(10);
        // dd($permintaan);
        
        return view('permintaan.page_permintaan', compact('permintaan'));
    }

    public function inputPermintaan()
    {
        $tematik = Tematik::all();

        return view('permintaan.form_permintaan', compact('tematik'));
    }

    public function simpanPermintaan(Request $request)
    {
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'price' => 'required',
        // ]);

        $show = Permintaan::create([
            'tanggal_permintaan' => $request->tgl_perm,
            'tematik_id' => $request->tematik_perm,
            'reff_permintaan' => $request->reff_perm,
            'nama_permintaan' => $request->nama_perm,
            'pic_permintaan' => $request->pic_perm,
            'keterangan' => $request->ket,
            'add_by' => 1, // diisi setelah ada role
            'edit_by' => 1, // diisi setelah ada role
            'status' => 'Order',
            'status_nodin' => $request->nodin,
        ]);
   
        return redirect('/')->with('success', 'Permintaan berhasil disimpan');
    }

    public function getDataProject(Request $request)
    {
        $permintaan = Permintaan::where('id', $request->id_permintaan)->first();
        
        return response()->json($permintaan, 200);
    }
}
