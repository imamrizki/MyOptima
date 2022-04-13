@extends('layouts.master')
@section('title', 'Project')
@section('project_active', 'active')

@section('content')
        
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Input Project</h5>
                <div class="card-body">
                    <form action="#" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-3 col-form-label">Tanggal Permintaan</label>
                            <div class="col-md-9">
                                <label>2022-04-13</label>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-3 col-form-label">Nama Permintaan</label>
                            <div class="col-md-9">
                                <label>Smart Connect</label>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Nama Project (LOP)</label>
                            <div class="col-md-9">
                              <input class="form-control" type="text" name="reff_perm" placeholder="No. Nota Dinas">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">Tematik LOP</label>
                            <div class="col-md-9">
                                <select name="tematik_perm" class="form-select">
                                    <option selected disabled>Pilih Tematik</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Estimasi RAB</label>
                            <div class="col-md-9">
                              <input class="form-control" type="text" name="reff_perm" placeholder="Estimasi RAB, Rp 20.000.000">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">STO</label>
                            <div class="col-md-9">
                                <select name="tematik_perm" class="form-select">
                                    <option selected disabled>Pilih STO</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Tikor LOP</label>
                            <div class="col-md-9">
                              <input class="form-control" type="text" name="pic_perm" placeholder="Lat Long">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Lokasi LOP</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="ket" rows="3" placeholder="Deskripsi Lokasi LOP"></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Keterangan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="ket" rows="3"></textarea>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">
                                <button type="button" class="btn btn-success">Simpan</button>
                                <a href="#" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
@endsection