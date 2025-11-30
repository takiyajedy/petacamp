@extends('layouts.main')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">Submit Tempat Camping Baru</h1>
        <p class="text-muted">Kongsikan lokasi menarik anda supaya komuniti lain dapat menemui tempat ini 🌿</p>
    </div>

    <div class="card shadow-sm border-0 rounded-3 p-4 mx-auto" style="max-width: 700px;">
        <form action="{{ route('camps.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Tempat</label>
                <input type="text" name="name" class="form-control" placeholder="Contoh: Sungai Lepoh Eco Camp" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Negeri</label>
                <select name="state" class="form-select" required>
                    <option value="">-- Pilih Negeri --</option>
                    <option>Selangor</option>
                    <option>Pahang</option>
                    <option>Johor</option>
                    <option>Perak</option>
                    <option>Negeri Sembilan</option>
                    <option>Kedah</option>
                    <option>Kelantan</option>
                    <option>Terengganu</option>
                    <option>Melaka</option>
                    <option>Perlis</option>
                    <option>Sabah</option>
                    <option>Sarawak</option>
                    <option>Wilayah Persekutuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Alamat</label>
                <input type="text" name="address" class="form-control" placeholder="Alamat penuh (jika ada)">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Penerangan</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Nyatakan maklumat menarik tentang tempat ini..."></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar Utama</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Koordinat (Opsyenal)</label>
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="latitude" class="form-control" placeholder="Latitude">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="longitude" class="form-control" placeholder="Longitude">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Kemudahan</label>
                <div class="form-check">
                    <input type="checkbox" name="has_toilet" class="form-check-input" id="toilet">
                    <label class="form-check-label" for="toilet">Tandas</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="has_river" class="form-check-input" id="river">
                    <label class="form-check-label" for="river">Sungai</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="has_electricity" class="form-check-input" id="electricity">
                    <label class="form-check-label" for="electricity">Bekalan Elektrik</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="has_bbq" class="form-check-input" id="bbq">
                    <label class="form-check-label" for="bbq">Tempat BBQ</label>
                </div>
            </div>

            <button type="submit" class="btn btn-success px-4 py-2 mt-2">Hantar</button>
        </form>
    </div>
</div>
@endsection
