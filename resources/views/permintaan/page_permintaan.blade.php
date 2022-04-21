@extends('layouts.master')
@section('title', 'Permintaan')
@section('permintaan_active', 'active')

@section('content')
        
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">
                <a href="{{ route('input_permintaan') }}" class="btn btn-primary">Input Permintaan</a>
            </h5>
        </div>
        <div class="table-responsive text-nowrap">
            @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session()->get('success') }}  
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Tematik</th>
                        <th>Nama Permintaan</th>
                        <th>Tanggal Permintaan</th>
                        <th>Project (LOP)</th>
                        <th>Reff</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($permintaan) > 0)
                        @foreach ($permintaan as $key => $item)
                            @php
                                $lop = App\Models\Project::where('permintaan_id', $item->id)->count();
                            @endphp
                            <tr>
                                <td>{{ $item->tematik->tematik }}</td>
                                <td><a href="{{ route('input_project') }}">
                                    {{ $item->nama_permintaan }} <i class='bx bx-link-external'></i></a> <br>
                                    Type : {{ $item->status_nodin }}
                                </td>
                                <td>{{ $item->tanggal_permintaan }}</td>
                                <td><a href="#">{{ $lop }} <i class='bx bx-link-external'></i></a></td>
                                <td><a href="#">{{ $item->reff_permintaan }} <i class='bx bx-link-external'></i></a></td>
                                <td>
                                    @php
                                        if ($item->status == 'In Progress') {
                                            $color = 'bg-danger'; // In Progress
                                        } else if($item->status == 'Close') {
                                            $color = 'bg-success'; // Close
                                        } else {
                                            $color = 'bg-warning'; // Order
                                        }
                                    @endphp
                                    <span class="badge {{ $color }}">{{ $item->status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Belum ada permintaan !</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="d-inline text-center">
                {!! $permintaan->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    
@endsection