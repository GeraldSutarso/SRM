@extends('layout.main')

@section('content')
{{ dd(session()->all()) }}
@endsection