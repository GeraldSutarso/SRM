@extends('layout.main')

@section('content')
    <div class="container">
        <h2>Step 3: Fill In Asset Mapping</h2>
        <form method="POST" action="{{ route('step3.post') }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <td><h5>Technical Asset Mapping</h5></td>
                    </tr>
                </thead><tbody>
                    <tr>
                        <td>Location</td>
                        <td>
                        <select id="t_location" class="form-control" name="t_location" required>
                            <option value="">Select Location</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input Technical Mapping Description" name="t_description" class="form-control" required>{{ old('t_description') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" name="mt_owner" class="form-control" value="{{ old('mt_owner') }}" required></td>
                    </tr>
                    <br>
                </tbody>
            </table>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <td><h5>Physical Asset Mapping</h5></td>
                    </tr>
                </thead><tbody>
                    <tr>
                        <td>Location</td>
                        <td>
                        <select id="p_location" class="form-control" name="p_location" required>
                            <option value="">Select Location</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input Physical Mapping Description" name="p_description" class="form-control" required>{{ old('p_description') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" name="mp_owner" class="form-control" value="{{ old('mp_owner') }}" required></td>
                    </tr>
                    <br>
                </tbody>
            </table>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <td><h5>Human Asset Mapping</h5></td>
                    </tr>
                </thead></tbody>
                    <tr>
                        <td>Location</td>
                        <td>
                        <select id="t_location" class="form-control" name="h_location" required>
                            <option value="">Select Location</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input Human Mapping Description" name="h_description" class="form-control" required>{{ old('h_description') }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" name="mh_owner" class="form-control" value="{{ old('mh_owner') }}" required></td>
                    </tr>
                    <br>
                </tbody>
            </table>
            <br>
            <div class="form-group">
              <a href="{{ route('step2') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
