@extends('layouts.main')

@section('content')
    <!-- ✅ Content -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Tempat Camping di Malaysia</h4>
            <div>
                <button class="btn btn-outline-secondary btn-sm">Cards</button>
                <button class="btn btn-outline-secondary btn-sm">Map</button>
            </div>
        </div>

        <div class="row">
            @php
                use App\Models\CampSite;
                $camps = CampSite::where('is_approved', true)->latest()->get();
            @endphp

            @forelse ($camps as $camp)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card shadow-sm border-0 rounded-3">
                        @if ($camp->image)
                            <img src="{{ asset('storage/' . $camp->image) }}" class="camp-image card-img-top"
                                alt="{{ $camp->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=600&q=60"
                                class="camp-image card-img-top">
                        @endif
                        <div class="card-body">
                            <h6 class="fw-semibold mb-1">{{ $camp->name }}</h6>
                            <p class="text-muted small mb-1">
                                📍 {{ $camp->state ?? 'Tidak diketahui' }}
                            </p>
                            <span class="badge {{ $camp->has_river ? 'bg-success' : 'bg-secondary' }}">
                                {{ $camp->has_river ? 'Ada Sungai' : 'Tiada Sungai' }}
                            </span>
                            <span class="badge {{ $camp->has_toilet ? 'bg-info text-dark' : 'bg-light text-dark' }}">
                                {{ $camp->has_toilet ? 'Ada Tandas' : 'Tiada Tandas' }}
                            </span>
                            <div class="mt-3 text-end">
                                <a href="#" class="btn btn-sm btn-outline-success">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Tiada tempat camping direkodkan buat masa ini.</p>
            @endforelse
        </div>
    </div>
@endsection
