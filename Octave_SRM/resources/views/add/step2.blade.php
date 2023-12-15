@extends('layout.main')

@section('content')
{{-- {{ dd(session()->all()) }} --}}
    <div class="container">
        <h2>Step 2: Choose Priority of Your Asset</h2>
        <form method="POST" action="{{ route('step2.post') }}">
            @csrf
            <table class="table">
                <tbody>
                    <tr>
                        <td><h5>Impact Area</h5></td>
                        <td><h5>Priority</h5></td>
                    </tr>
                    <tr>
                        <td>Reputation and Consumer Trust</td>
                        <td><select id="trust" class="form-control" name="trust" required>
                            <option value="">Select Priority Value</option>
                            @foreach([5, 4, 3, 2, 1] as $value)
                            <option value="{{ $value }}" @selected(session('priority.trust') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Finance</td>
                        <td><select id="finance" class="form-control" name="finance" required>
                            <option value="">Select Priority Value</option>
                            @foreach([5, 4, 3, 2, 1] as $value)
                            <option value="{{ $value }}" @selected(session('priority.finance') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
                        </select></td>    
                    </tr>
                    <tr>
                        <td>Productivity</td>
                        <td><select id="productivity" class="form-control" name="productivity" required>
                            <option value="">Select Priority Value</option>
                            @foreach([5, 4, 3, 2, 1] as $value)
                            <option value="{{ $value }}" @selected(session('priority.productivity') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
                        </select></td>    
                    </tr>
                    <tr>
                        <td>Safety and Health</td>
                        <td><select id="safety" class="form-control" name="safety" required>
                            <option value="">Select Priority Value</option>
                            @foreach([5, 4, 3, 2, 1] as $value)
                            <option value="{{ $value }}" @selected(session('priority.safety') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Fines and Legal Sanctions</td>
                        <td><select id="fines" class="form-control" name="fines" required>
                            <option value="">Select Priority Value</option>
                            @foreach([5, 4, 3, 2, 1] as $value)
                            <option value="{{ $value }}" @selected(session('priority.fines') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
                        </select></td>
                    </tr>
                </tbody>
            </table>
                    <!-- Check for errors and display the message -->
            @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
            </div>
            @endif
            <div class="form-group">
                <a href="{{ route('step1') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
