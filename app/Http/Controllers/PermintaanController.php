<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tematik;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $permintaan = Permintaan::create([
            'tanggal_permintaan' => $request->tgl_perm,
            'tematik_id' => $request->tematik_perm,
            'reff_permintaan' => $request->reff_perm,
            'nama_permintaan' => $request->nama_perm,
            'pic_permintaan' => $request->pic_perm,
            'keterangan' => $request->ket,
            'add_by' => Auth::id(), // diisi setelah ada role
            'edit_by' => Auth::id(), // diisi setelah ada role
            'status' => 'Order', // Order, Inprogress, Close
            'status_nodin' => $request->nodin, // Nodin, Non-Nodin
        ]);
   
        return redirect('/')->with('success', 'Permintaan berhasil disimpan');
    }

    public function getDataPermintaan(Request $request)
    {
        $permintaan = Permintaan::where('id', $request->id_permintaan)->first();

        $lop = Project::where('permintaan_id', $request->id_permintaan)->get();

        $component_lop = '';

        if (count($lop) > 0) {
            foreach ($lop as $key => $value) {
                $component_lop .= '<div class="card shadow-none bg-transparent border border-info mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">'.$value->nama_project.'</h5>
                                    <p class="card-text">
                                        Status LOP :  '.$value->status.'<br>
                                        Status RAB : 
                                    </p>
                                    <div class="demo-inline mb-3">
                                        <button type="button" class="btn btn-sm btn-outline-info">
                                            <i class="bx bx-edit"></i>&nbsp; Update
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-success">
                                            <i class="bx bx-dollar-circle"></i>&nbsp; Rab
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <i class="bx bxs-timer"></i>&nbsp; Progress
                                        </button>
                                    </div>
                                    <h6 style="margin-bottom: 0;">'.$value->created_at.'</h6>
                                </div>
                            </div>';
            }
        } else {
            $component_lop .= '<div>Project LOP belum di input !</div>';
        }
        
        return response()->json(['permintaan' => $permintaan, 'component_lop' => $component_lop], 200);
    }
}
