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
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Finance</td>
                        <td><select id="finance" class="form-control" name="finance" required>
                            <option value="">Select Priority Value</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select></td>    
                    </tr>
                    <tr>
                        <td>Productivity</td>
                        <td><select id="productivity" class="form-control" name="productivity" required>
                            <option value="">Select Priority Value</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select></td>    
                    </tr>
                    <tr>
                        <td>Safety and Health</td>
                        <td><select id="safety" class="form-control" name="safety" required>
                            <option value="">Select Priority Value</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Fines and Legal Sanctions</td>
                        <td><select id="fines" class="form-control" name="fines" required>
                            <option value="">Select Priority Value</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
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
