@extends('layout.main')
@section('content')
{{-- {{ dd(session()->all()) }} --}}
    <div class="container">
        <center><h2>Save the data?</h2></center>
        <form method="POST" action="{{ route('add.save') }}">
            @csrf
            <div class="form-group">
                <a href="{{ route('step5') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
