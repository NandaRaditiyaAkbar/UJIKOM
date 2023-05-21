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
                        <th>Tanggal</th>
                        <th colspan="2" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataartikel as $data)
                    <tr>
                        <td>{{$data->judul_artikel}}</td>
                        <td>{{$data->isi_artikel}}</td>
                        <td>{{$data->tanggal}}</td>
                        <td class="text-center">
                            <a href="{{route('editartikel',$data->id)}}" type="button" class="btn btn-warning">Edit</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('deleteartikel', $data->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection