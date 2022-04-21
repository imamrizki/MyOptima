@extends('layouts.master')
@section('title', 'Project')
@section('project_active', 'active')

@section('content')
        
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <h5 class="card-header">Input Project (LOP)</h5>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session()->get('success') }}  
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('simpan_project') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-3 col-form-label">Nama Permintaan</label>
                            <div class="col-md-9">
                                <select name="permintaan_id" class="form-select" id="permintaan_id">
                                    <option value="" selected disabled>Pilih Permintaan</option>
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
                              <input class="form-control" type="text" name="nama_project" placeholder="Nama Project">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">Tematik LOP</label>
                            <div class="col-md-9">
                                <select name="tematik_lop" class="form-select">
                                    <option selected disabled>Pilih Tematik LOP</option>
                                    @foreach ($tematik as $item)
                                        <option value="{{ $item->id }}">{{ $item->tematik }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Estimasi RAB</label>
                            <div class="col-md-9">
                                <select name="estimasi_rab" class="form-select">
                                    <option selected disabled>Pilih Estimasi RAB</option>
                                    <option value="< 20 Jt">< 20 Jt</option>
                                    <option value="> 20 Jt">> 20 Jt</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">STO</label>
                            <div class="col-md-9">
                                <select name="sto_id" class="form-select">
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
                              <input class="form-control" type="text" name="tikor_lop" placeholder="Lat Long">
                            </div>
                        </div>
    
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Lokasi LOP</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="lokasi_lop" rows="3" placeholder="Deskripsi Lokasi LOP"></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Keterangan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="keterangan" rows="3"></textarea>
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

        <div class="col-md-4">
            <div class="card mb-4">
                <h5 class="card-header">List Of Project (LOP)</h5>
                <div class="card-body">

                    <div id="component_lop">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('update_project') }}" method="POST">
                @csrf
                <input type="hidden" name="id_project" id="id_project">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Update LOP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBackdrop" class="form-label">Pilih Mitra</label>
                            <select name="permintaan_id" class="form-select" id="permintaan_id">
                                <option value="" selected disabled>Pilih Mitra</option>
                                @foreach ($mitra as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        $(document).ready(function(){

            var permintaan = document.getElementById('permintaan_id');
            var updateButton = document.getElementById('button');

            if (permintaan.value === '') {
                document.getElementById('component_lop').innerHTML = `<div class="text-left">Melihat LOP pilih permintaan terlebih dahulu !</div>`;
            }

            permintaan.addEventListener('change', () => {

                axios.get('http://myoptima.local/get-permintaan', {
                        params: {
                            id_permintaan: permintaan.value
                        }
                    })
                    .then(function (response) {
                        document.getElementById('tanggal_permintaan').value = response.data.permintaan.tanggal_permintaan;
                        document.getElementById('component_lop').innerHTML = response.data.component_lop;

                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

            });

            $(document).on('click', 'button.update', function () {

                $('#id_project').val($(this).attr('data-id'));

            });

        });


    </script>
@endsection