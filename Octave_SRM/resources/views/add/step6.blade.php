@extends('layout.main')
@section('content')
{{-- {{ dd(session()->all()) }} --}}
    <div class="container">
        <center><h2>Are you sure you want to save the data?</h2></center>
        <br><br>
        <form method="POST" action="{{ route('add.save') }}">
            @csrf
            <center><div class="form-group">
                <a href="{{ route('step5') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </center>
        </form>
    </div>
@endsection
