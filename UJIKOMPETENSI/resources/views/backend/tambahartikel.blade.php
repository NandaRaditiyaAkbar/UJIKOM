@extends('backend/layouts.template')
@section('content')

<form action="{{route('prosestambahartikel')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="judul_artikel" class="form-label">Judul Artikel</label>
      <input name="judul_artikel" type="text" class="form-control" id="judul_artikel" placeholder="Masukkan Judul"></input>
    </div>
    <div class="mb-3">
      <label for="isi_artikel" class="form-label">Isi Artikel</label>
      <textarea name="isi_artikel" type="text" class="form-control" id="isi_artikel" placeholder="Masukkan Isi"></textarea>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input name="tanggal" type="date" class="form-control" id="tanggal"></input>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection