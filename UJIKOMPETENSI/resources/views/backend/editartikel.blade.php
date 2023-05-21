@extends('backend/layouts.template')
@section('content')

<form action="{{route('updateartikel',$dataartikel->id)}}" method="post">
    @csrf
    <div class="mb-3" hidden>
      <label for="nama_obat" class="form-label">Kode Artikel</label>
      <input name="nama_obat" type="text" class="form-control" id="id" placeholder="Masukkan Nama Obat" value="{{$dataartikel->id}}"></input>
    </div>
    <div class="mb-3">
      <label for="judul_artikel" class="form-label">Judul Artikel</label>
      <input name="judul_artikel" type="text" class="form-control" id="judul_artikel" placeholder="Masukkan Judul" value="{{$dataartikel->judul_artikel}}"></input>
    </div>
    <div class="mb-3">
      <label for="isi_artikel" class="form-label">Isi Artikel</label>
      <textarea name="isi_artikel" type="text" class="form-control" id="isi_artikel">{{$dataartikel->isi_artikel}}</textarea>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input name="tanggal" type="date" class="form-control" id="tanggal" value="{{$dataartikel->tanggal}}"></input>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection