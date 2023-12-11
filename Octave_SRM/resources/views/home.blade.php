@extends('layout.main')

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('step1') }}"><button class="btn btn-success">+ Add</button></a><br><br>
    <div class="card">
        <div class="card-header">
            <form action="{{ route('search') }}" method="GET" class="float-end" style="max-width: 300px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button class="btn btn-outline-secondary" type="submit" id="button-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <!-- Table -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Asset Name</th>
                            <th>Department</th>
                            <th>Time Created</th>
                            <!-- Add other table headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $index => $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->asset_name }}</td>
                                <td>{{ $result->a_department }}</td>
                                <td>{{ $result->created_at }}</td>
                                <!-- Add other data columns as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {!! $results->links() !!}
        </div>
        </div>
    </div>
</div>
@endsection