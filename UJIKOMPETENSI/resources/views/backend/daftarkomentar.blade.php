@extends('backend/layouts.template')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Komentar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Komentator</th>
                        <th>Isi Komentar</th>
                        @if (auth()->user()->level == "penulis")
                        <th colspan="2" class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftarkomentar as $data)
                    <tr>
                        <td>{{$data->judul_artikel}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->isi_komentar}}</td>
                        @if (auth()->user()->level == "penulis")
                        <td class="text-center">
                            <form action="{{ route('deletekomentar', $data->id_komentar) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>

                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection