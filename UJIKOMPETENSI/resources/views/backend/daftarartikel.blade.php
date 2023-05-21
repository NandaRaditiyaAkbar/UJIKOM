@extends('backend/layouts.template')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penulis</h6>
        <a type="button" class="btn btn-primary mt-4" href="{{route('tambahartikel')}}">Tambah Artikel</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Isi Artikel</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataartikel as $data)
                    <tr>
                        <td>{{$data->judul_artikel}}</td>
                        <td>{{$data->isi_artikel}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->tanggal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection