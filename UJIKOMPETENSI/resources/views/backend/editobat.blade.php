@extends('backend/layouts.template')
@section('content')

<form action="{{route('updateobat',$dataobat->id)}}" method="post">
    @csrf
    <div class="mb-3" hidden>
      <label for="nama_obat" class="form-label">kode Obat</label>
      <input name="nama_obat" type="text" class="form-control" id="nama_obat" placeholder="Masukkan Nama Obat" value="{{$dataobat->id}}"></input>
    </div>
    <div class="mb-3">
      <label for="nama_obat" class="form-label">Nama Obat</label>
      <input name="nama_obat" type="text" class="form-control" id="nama_obat" placeholder="Masukkan Nama Obat" value="{{$dataobat->nama_obat}}"></input>
    </div>
    <div class="mb-3">
      <label for="jumlah_obat" class="form-label">Jumlah Obat</label>
      <input name="jml_obat" type="text" class="form-control" id="jumlah_obat" placeholder="Masukkan Jumlah Obat" value="{{$dataobat->jml_obat}}"></input>
    </div>
    <div class="mb-3">
      <label for="harga_obat" class="form-label">Harga Obat</label>
      <input name="hrg_obat" type="text" class="form-control" id="harga_obat" placeholder="Masukkan Harga Obat" value="{{$dataobat->hrg_obat}}"></input>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection