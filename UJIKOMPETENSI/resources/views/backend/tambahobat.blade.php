@extends('backend/layouts.template')
@section('content')

<form action="{{route('prosestambahobat')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nama_obat" class="form-label">Nama Obat</label>
      <input name="nama_obat" type="text" class="form-control" id="nama_obat" placeholder="Masukkan Nama Obat"></input>
    </div>
    <div class="mb-3">
      <label for="jumlah_obat" class="form-label">Jumlah Obat</label>
      <input name="jml_obat" type="text" class="form-control" id="jumlah_obat" placeholder="Masukkan Jumlah Obat"></input>
    </div>
    <div class="mb-3">
      <label for="harga_obat" class="form-label">Harga Obat</label>
      <input name="hrg_obat" type="text" class="form-control" id="harga_obat" placeholder="Masukkan Harga Obat"></input>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection