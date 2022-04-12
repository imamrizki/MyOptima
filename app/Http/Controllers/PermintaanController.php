<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function pagePermintaan()
    {
        $permintaan = Permintaan::all();
        
        return view('permintaan.page_permintaan', compact('permintaan'));
    }

    public function inputPermintaan()
    {
        return view('permintaan.form_permintaan');
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
        ]);
   
        return redirect('/')->with('success', 'Permintaan berhasil disimpan');
    }
}
