<?php

namespace App\Http\Controllers;

use App\Models\Sto;
use App\Models\User;
use App\Models\Project;
use App\Models\Tematik;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function inputProject()
    {
        $permintaan = Permintaan::get();
        $tematik = Tematik::all();
        $sto = Sto::get();

        $lop = Project::with(['permintaan'])->get();

        $mitra = User::whereHas(
            'roles', function($q){
                $q->where('name', 'Mitra');
            }
        )->get();

        return view('project.form_project', compact('permintaan', 'sto', 'tematik', 'lop', 'mitra'));
    }

    public function simpanProject(Request $request)
    {
        $project = Project::create([
            'permintaan_id' => $request->permintaan_id, 
            'tematik_id' => $request->tematik_lop,
            'sto_id' => $request->sto_id,
            'nama_project' => $request->nama_project,
            'estimasi_rab' => $request->estimasi_rab,
            'tikor_lop' => $request->tikor_lop,
            'lokasi_lop' => $request->lokasi_lop,
            'keterangan' => $request->keterangan,
            'add_by' => Auth::id(),
            'edit_by' => Auth::id(), 
            'status' => 'Belum Diserahkan', // Belum Diserahkan, Dikerjakan, Selesai
        ]);
   
        return redirect('/project')->with('success', 'Project berhasil disimpan');
    }

    public function updateProject(Request $request)
    {
        $project = Project::where('id', $request->id_project)->update([
            // 'permintaan_id' => $request->permintaan_id, 
            // 'tematik_id' => $request->tematik_lop,
            // 'sto_id' => $request->sto_id,
            // 'nama_project' => $request->nama_project,
            // 'estimasi_rab' => $request->estimasi_rab,
            // 'tikor_lop' => $request->tikor_lop,
            // 'lokasi_lop' => $request->lokasi_lop,
            // 'keterangan' => $request->keterangan,
            'add_by' => Auth::id(),
            'edit_by' => Auth::id(), 
            'status' => 'Diserahkan', // Belum Diserahkan, Dikerjakan, Selesai
        ]);

        return redirect('/project')->with('success', 'Project berhasil diupdate');
    }

}
