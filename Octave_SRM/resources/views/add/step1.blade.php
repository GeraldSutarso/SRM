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
                        <td><input type="text" placeholder="Input the critical asset name" name="asset_name" class="form-control" value="{{ session('asset.asset_name') }}" required></td>
                    </tr>
                    <tr>
                        <td>Rationale for Selection</td>
                        <td><input type="text" placeholder="Input the rationale for selection" name="rationale_for_select" class="form-control" value="{{ session('asset.rationale_for_select') }}" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input asset description" name="description" class="form-control" required>{{ session('asset.description') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" name="owner" class="form-control" value="{{ auth()->user()->username }}" readonly></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        @if (auth()->user()->user_id == '1')
                        <td>
                            <select id="department" class="form-control" name="a_department" required>
                                <option value="">Select Department</option>
                                <option value="IT">IT</option>
                                <option value="HR">Human Resource</option>
                                <option value="Logistic">Logistic</option>
                                <option value="Engineering">Engineering</option>
                                <option value="RnD">Research and Development</option>
                                <option value="FA">Finance and Accounting</option>
                                <option value="Sales">Sales</option>
                                <option value="BD">Business Development</option>
                                <option value="PPIC">Production, Planning, Inventory Control</option>
                            </select>
                        </td>
                        @else
                        <td><input type="text" name="a_department" class="form-control" value="{{ auth()->user()->department }}" readonly></td>
                        @endif
                    </tr>
                    <tr><td><h5>Security Requirements</h5></td>
                    </tr>
                    <tr>
                        <td>Confidentiality</td>
                        <td><textarea placeholder="Input confidentiality description" name="SR_confidentiality" class="form-control" required>{{ session('asset.SR_confidentiality') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Integrity</td>
                        <td><textarea placeholder="Input integrity description" name="SR_integrity" class="form-control" required>{{ session('asset.SR_integrity') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Availability</td>
                        <td><textarea placeholder="Input availability description" name="SR_availability" class="form-control" required>{{ session('asset.SR_availability') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Most Important Security Requirement</td>
                        <td> <select id="most_important_SR" class="form-control" name="most_important_SR" required>
                            <option value="">Select the most important security requirement</option>
                            @foreach(['Confidentiality','Integrity','Availability'] as $value)
                                <option value="{{ $value }}" @selected(session('asset.most_important_SR') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
              <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
              <button type="submit"  class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
