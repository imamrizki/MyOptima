@extends('layouts.master')
@section('title', 'Input Permintaan')
@section('permintaan_active', 'active')

@section('content')
        
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Input Permintaan</h5>
                <div class="card-body">
                    <form action="{{ route('simpan_permintaan') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-3 col-form-label">Tanggal Permintaan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="tgl_perm" id="html5-date-input">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">Tematik Permintaan</label>
                            <div class="col-md-9">
                                <select name="tematik_perm" class="form-select">
                                    <option selected disabled>Pilih Tematik</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Reff Permintaan</label>
                            <div class="col-md-9">
                              <input class="form-control" type="text" name="reff_perm" placeholder="No. Nota Dinas">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Nama Permintaan</label>
                            <div class="col-md-9">
                              <input class="form-control" type="text" name="nama_perm" placeholder="Nama Permintaan">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">PIC Permintaan</label>
                            <div class="col-md-9">
                              <input class="form-control" type="text" name="pic_perm" placeholder="PIC Permintaan">
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
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('page_permintaan') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
@endsection