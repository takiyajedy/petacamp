@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Tambah Tempat Camping</h2>
    <form action="/submit/camp" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Tempat</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Negeri</label>
            <input type="text" name="state" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-check">
            <input type="checkbox" name="has_toilet" class="form-check-input"> Ada Tandas
        </div>
        <div class="form-check">
            <input type="checkbox" name="has_river" class="form-check-input"> Ada Sungai
        </div>
        <div class="form-check">
            <input type="checkbox" name="has_bbq" class="form-check-input"> Ada Tempat BBQ
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="has_electricity" class="form-check-input"> Ada Elektrik
        </div>
        <button type="submit" class="btn btn-primary">Hantar</button>
    </form>
</div>
@endsection
