@extends('backend/layouts.template')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
        <a type="button" class="btn btn-primary mt-4" href="{{route('tambahobat')}}">Tambah Obat</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataobat as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama_obat}}</td>
                        <td>{{$data->jml_obat}}</td>
                        <td>{{$data->hrg_obat}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection