@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-success">Kelulusan Tempat Camping</h2>
        <a href="/" class="btn btn-outline-secondary btn-sm">⬅ Kembali ke Laman Utama</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('danger'))
        <div class="alert alert-danger">{{ session('danger') }}</div>
    @endif

    @if ($pendingCamps->count() > 0)
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nama Tempat</th>
                        <th>Negeri</th>
                        <th>Pencadang</th>
                        <th>Kemudahan</th>
                        <th>Gambar</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingCamps as $camp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $camp->name }}</td>
                            <td>{{ $camp->state }}</td>
                            <td>{{ $camp->user->name ?? '-' }}</td>
                            <td>
                                @if($camp->has_river) 💧 @endif
                                @if($camp->has_toilet) 🚻 @endif
                                @if($camp->has_bbq) 🍖 @endif
                                @if($camp->has_electricity) ⚡ @endif
                            </td>
                            <td>
                                @if ($camp->image)
                                    <img src="{{ asset('storage/'.$camp->image) }}" alt="{{ $camp->name }}" class="rounded" style="width:80px; height:60px; object-fit:cover;">
                                @else
                                    <span class="text-muted">Tiada</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.camps.approve', $camp->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.camps.reject', $camp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tolak tempat ini?')">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-muted py-5">
            <p class="fs-5">Tiada tempat camping yang menunggu kelulusan ✨</p>
        </div>
    @endif
</div>
@endsection
