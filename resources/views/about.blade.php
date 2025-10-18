@extends('layouts.main')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">Tentang PetaCamp</h1>
        <p class="text-muted">Platform komuniti untuk pencinta alam dan penggemar aktiviti berkhemah di Malaysia 🌲</p>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=80" 
                 alt="About PetaCamp" 
                 class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
            <h3 class="fw-semibold text-dark mb-3">Mengenai Projek Ini</h3>
            <p class="text-muted">
                <strong>PetaCamp</strong> dibangunkan sebagai inisiatif terbuka untuk membantu para pencinta alam
                menemui lokasi-lokasi menarik untuk berkhemah di seluruh Malaysia.
                Sama ada anda mencari tapak berdekatan sungai, hutan, atau pantai — PetaCamp menyediakan
                maklumat lengkap tentang kemudahan, peta lokasi, dan ulasan daripada komuniti.
            </p>

            <h4 class="fw-semibold text-dark mt-4 mb-2">Misi Kami</h4>
            <ul class="text-muted">
                <li>🌿 Menggalakkan aktiviti luar yang sihat dan mesra alam.</li>
                <li>📍 Memudahkan pencarian tapak camping yang sesuai di Malaysia.</li>
                <li>🤝 Membina komuniti penggemar camping untuk berkongsi pengalaman.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
