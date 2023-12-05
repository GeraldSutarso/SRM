@extends('layout.main')

@section('content')
<div class="container">
    <a href="{{ route('step1') }}"><button class="btn btn-success">+ Add</button></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Critical Asset List') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    Tabel nanti taro di sini
                </div>
            </div>
        </div>
    </div>
</div>
@endsection