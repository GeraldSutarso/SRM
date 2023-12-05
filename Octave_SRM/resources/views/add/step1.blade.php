@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rationale for Selection</th>
                <th>Description</th>
                <!-- Add other headers here -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Input Critical Asset</td>
                <td><input type="text" name="critical_asset" value="{{ old('critical_asset') }}" class="form-control" /></td>
                <!-- Add other input fields here -->
            </tr>
            <tr>
                <td>Input Rationale for Selection</td>
                <td><input type="text" name="rationale_for_selection" value="{{ old('rationale_for_selection') }}" class="form-control" /></td>
                <!-- Add other input fields here -->
            </tr>
            <!-- Add other rows here -->
        </tbody>
    </table>
@endsection
