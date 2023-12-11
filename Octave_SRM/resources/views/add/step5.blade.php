@extends('layout.main')
{{ dd(session()->all()) }}
@section('content')
{{-- {{ dd(session()->all()) }} --}}
    <div class="container">
        <h2>Step 5: Choose Impact Severity</h2>
        <form method="POST" action="{{ route('step5.post') }}">
            @csrf
            <table class="table">
                <tbody>
                    <tr>
                        <td><h5>Impact Area</h5></td>
                        <td><h5>Value</h5></td>
                        <td><h5>Score</h5></td>
                    </tr>
                    <tr>
                        <td>Reputation and Consumer Trust</td>
                        <td><select id="rep_value" class="form-control" name="rep_value" required>
                            <option value="">Select Severity Value</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select></td>
                        <td><select id="rep_score" class="form-control" name="rep_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Finance</td>
                        <td><select id="finance_value" class="form-control" name="finance_value" required>
                            <option value="">Select Severity Value</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select></td>
                        <td><select id="finance_score" class="form-control" name="finance_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Productivity</td>
                        <td><select id="productivity_value" class="form-control" name="productivity_value" required>
                            <option value="">Select Severity Value</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select></td>
                        <td><select id="productivity_score" class="form-control" name="productivity_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Safety and Health</td>
                        <td><select id="safety_value" class="form-control" name="safety_value" required>
                            <option value="">Select Severity Value</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select></td>
                        <td><select id="safety_score" class="form-control" name="safety_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Fines and Legal Sanctions</td>
                        <td><select id="fines_value" class="form-control" name="fines_value" required>
                            <option value="">Select Severity Value</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select></td>
                        <td><select id="fines_score" class="form-control" name="fines_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Relative Risk Score
                        </td>
                        <td>
                        </td>
                        <td><input type="text" name="rr_score" class="form-control" value="{{ old('rr_score') }}" readonly required>
                        </td>
                    </tr>
                </tbody>
            </table>
                    <!-- Check for errors and display the message -->
                @if(isset($errors) && is_array($errors))
                    @foreach($errors as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            <div class="form-group">
                <a href="{{ route('step4') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
    <script>
        // Function to calculate and update the Relative Risk Score
        function updateRRScore() {
            // Get the selected values of safety_score and fines_score
            var repScore = parseInt(document.getElementById('rep_score').value) || 0;
            var financeScore = parseInt(document.getElementById('finance_score').value) || 0;
            var productivityScore = parseInt(document.getElementById('productivity_score').value) || 0;
            var safetyScore = parseInt(document.getElementById('safety_score').value) || 0;
            var finesScore = parseInt(document.getElementById('fines_score').value) || 0;
    
            // Calculate the sum of the scores
            var rrScore = repScore + financeScore + productivityScore + safetyScore + finesScore;
    
            // Update the rr_score input with the calculated score
            document.getElementsByName('rr_score')[0].value = rrScore;
        }
    </script>
@endsection
