@extends('layout.main')

@section('content')
    <div class="container">
        <h2>Step 1: Fill In Asset Information</h2>
        <form method="POST" action="{{ route('step1.post') }}">
            @csrf
            <table class="table">
                <tbody>
                    <tr>
                        <td>Critical Asset</td>
                        <td><input type="text" placeholder="Input the critical asset name" name="asset_name" class="form-control" value="{{ old('asset_name') }}" required></td>
                    </tr>
                    <tr>
                        <td>Rationale for Selection</td>
                        <td><input type="text" placeholder="Input the rationale for selection" name="rationale_for_select" class="form-control" value="{{ old('rationale_for_select') }}" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input asset description" name="description" class="form-control" required>{{ old('description') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" name="username" class="form-control" value="{{ old('username') }}" disabled></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><input type="text" name="department" class="form-control" value="{{ old('department') }}" disabled></td>
                    </tr>
                    <tr><td><h5>Security Requirements</h5></td>
                    </tr>
                    <tr>
                        <td>Confidentiality</td>
                        <td><textarea type="text" placeholder="Input confidentiality description" name="confidentiality" class="form-control" value="{{ old('SR_confidentiality') }}" required>{{ old('SR_availability') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Integrity</td>
                        <td><textarea type="text" placeholder="Input integrity description" name="integrity" class="form-control" value="{{ old('SR_integrity') }}" required>{{ old('SR_availability') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Availability</td>
                        <td><textarea type="text" placeholder="Input availability description" name="availability" class="form-control" value="{{ old('SR_availability') }}" required>{{ old('SR_availability') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Most Important Security Requirement</td>
                        <td> <select id="department" class="form-control" name="department" required>
                            <option value="">Select the most important security requirement</option>
                            <option value="Confidentiality">Confidentiality</option>
                            <option value="Integrity">Integrity</option>
                            <option value="Availability">Availability</option>
                        </select></td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>

@endsection