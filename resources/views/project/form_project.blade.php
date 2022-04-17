@extends('layouts.master')
@section('title', 'Project')
@section('project_active', 'active')

@section('content')
        
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Input Project (LOP)</h5>
                <div class="card-body">
                    <form action="#" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-3 col-form-label">Nama Permintaan</label>
                            <div class="col-md-9">
                                <select name="permintaan_id" class="form-select" id="permintaan_id">
                                    <option selected disabled>Pilih Tematik</option>
                                    @foreach ($permintaan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_permintaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-3 col-form-label">Tanggal Permintaan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="tanggal_permintaan" id="tanggal_permintaan" value="0000-00-00" readonly>
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
                                <select name="tematik_perm" class="form-select">
                                    <option selected disabled>Pilih Estimasi RAB</option>
                                    <option value="< 20 Jt">< 20 Jt</option>
                                    <option value="> 20 Jt">> 20 Jt</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">STO</label>
                            <div class="col-md-9">
                                <select name="tematik_perm" class="form-select">
                                    <option selected disabled>Pilih STO</option>
                                    @foreach ($sto as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_sto }} - {{ $item->nama_sto }}</option>
                                    @endforeach
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
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        var permintaan = document.getElementById('permintaan_id');

        permintaan.addEventListener('change', () => {

            axios.get('http://myoptima.local/get-permintaan', {
                    params: {
                        id_permintaan: permintaan.value
                    }
                })
                .then(function (response) {
                    document.getElementById('tanggal_permintaan').value = response.data.tanggal_permintaan;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });

        });


    </script>
@endsection