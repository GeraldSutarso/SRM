@extends('layouts.app')

@section('content')
    <h1>Asset Details</h1>
    <div>
        <p>ID: {{ $asset->id }}</p>
        <p>Name: {{ $asset->name }}</p>
        <!-- Tambahkan lebih banyak field sesuai kebutuhan -->
    </div>

    <h2>Related Data</h2>
    @foreach ($asset->relatedModels as $relatedModel)
        <div>
            <p>Related Model ID: {{ $relatedModel->id }}</p>
            <!-- Tambahkan lebih banyak field sesuai kebutuhan -->
        </div>
    @endforeach

    {{-- Tombol untuk menghasilkan PDF --}}
    <form action="{{ url('/generate-pdf/' . $asset->id) }}" method="POST">
        @csrf
        <button type="submit">Generate PDF</button>
    </form>
@endsection
