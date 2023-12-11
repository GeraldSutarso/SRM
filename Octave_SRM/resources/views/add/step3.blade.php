@extends('layout.main')

@section('content')
{{-- {{ dd(session()->all()) }} --}}
    <div class="container">
        <h2>Step 3: Fill In Asset Mapping</h2>
        <form method="POST" action="{{ route('step3.post') }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <td><h5>Technical Asset Mapping</h5></td>
                    </tr>
                </thead>
                {{-- Loop to create technical asset rows --}}
                @for ($i = 0; $i < session('technical_asset_count', 1); $i++)
                <tbody>
                    <tr>
                        <td>Location</td>
                        <td>
                        <select id="t_location_{{ $i }}" class="form-control" name="t_location[]" required>
                            <option value="">Select Location</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input Technical Mapping Description" name="t_description[]" class="form-control" required>{{ old('t_description.'.$i) }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" placeholder="Input the owner of this mapping container" name="mt_owner[]" class="form-control" value="{{ old('mt_owner.'.$i) }}" required></td>
                    </tr>
                    <br>
                </tbody>
                @endfor
            </table>
            {{-- Button to add more --}}
            <a href="{{ route('add.technical', ['add_technical' => true]) }}" class="btn btn-success"> + </a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <td><h5>Physical Asset Mapping</h5></td>
                    </tr>
                </thead>
                @for ($i = 0; $i < session('physical_asset_count', 1); $i++)
                <tbody>
                    <tr>
                        <td>Location</td>
                        <td>
                        <select id="p_location_{{ $i }}" class="form-control" name="p_location[]" required>
                            <option value="">Select Location</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input Physical Mapping Description" name="p_description[]" class="form-control" required>{{ old('t_description.'.$i) }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" placeholder="Input the owner of this mapping container" name="mp_owner[]" class="form-control" value="{{ old('mp_owner.'.$i) }}" required></td>
                    </tr>
                    <br>
                </tbody>
                @endfor
            </table>
            {{-- Button to add more --}}
            <a href="{{ route('add.physical', ['add_physical' => true]) }}" class="btn btn-success"> + </a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <td><h5>Human Asset Mapping</h5></td>
                    </tr>
                </thead>
                @for ($i = 0; $i < session('human_asset_count', 1); $i++)
                <tbody>
                    <tr>
                        <td>Location</td>
                        <td>
                        <select id="h_location_{{ $i }}" class="form-control" name="h_location[]" required>
                            <option value="">Select Location</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea placeholder="Input Human Mapping Description" name="h_description[]" class="form-control" required>{{ old('h_description.'.$i) }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input type="text" placeholder="Input the owner of this mapping container" name="mh_owner[]" class="form-control" value="{{ old('mh_owner.'.$i) }}" required></td>
                    </tr>
                    <br>
                </tbody>
                @endfor
            </table>
            {{-- Button to add more --}}
            <a href="{{ route('add.human', ['add_human' => true]) }}" class="btn btn-success"> + </a>
            <br>
            <br>
            <br>
            <div class="form-group">
              <a href="{{ route('step2') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
