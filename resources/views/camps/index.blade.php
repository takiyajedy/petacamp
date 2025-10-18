@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">🏕️ Tempat Camping Malaysia</h1>

    <div class="row">
        @foreach ($camps as $camp)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                @if ($camp->image)
                    <img src="{{ asset('storage/'.$camp->image) }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $camp->name }}</h5>
                    <p>{{ $camp->state }}</p>
                    <p class="text-muted">{{ Str::limit($camp->description, 80) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
