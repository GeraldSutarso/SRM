@extends('layout.main')

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
    @endif
    <div class="container">
        <h2>Edit Asset Information</h2>
        <form method="POST" action="{{ route('step1.set') }}">
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
                        <td><textarea placeholder="Input asset description" name="description" class="form-control" required>{{ session('asset.asset_desc') }}</textarea></td>
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
                                @foreach(['IT','HR', 'Logistic', 'Engineering', 'RnD','FA','Sales','BD','PPIC'] as $value)
                            <option value="{{ $value }}" @selected(session('asset.a_department') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
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
              <button type="submit"  class="btn btn-info">Ok</button>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <h2>Update Priority of Your Asset</h2>
        <form method="POST" action="{{ route('step2.set') }}">
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
                <button type="submit" class="btn btn-info">Ok</button>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <h2>Asset Mapping</h2>
        <br>
        <a class="btn btn-primary" href="{{ route('step3.update',  $asset->asset_id)  }}">Edit Mapping</a>
        <br>
        <br>
        <h5>Human Mapping</h5>
        <!-- Add Bootstrap classes to the table -->
        <table class="table table-bordered table-light table-hover table-sm table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mapHumanData as $mapHuman)
                <tr>
                    <td>{{$mapHuman->h_location }} </td>
                    <td>{{$mapHuman->h_description }} </td>
                    <td>{{$mapHuman->mh_owner }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h5>Physical Mapping</h5>
        <!-- Add Bootstrap classes to the table -->
        <table class="table table-bordered table-light table-hover table-sm table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mapPhysicalData as $mapPhysical)
                <tr>
                    <td>{{$mapPhysical->p_location }} </td>
                    <td>{{$mapPhysical->p_description }} </td>
                    <td>{{$mapPhysical->mp_owner }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h5>Technical Mapping</h5>
        <!-- Add Bootstrap classes to the table -->
        <table class="table table-bordered table-light table-hover table-sm table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mapTechnicalData as $mapTechnical)
                <tr>
                    <td>{{$mapTechnical->t_location }} </td>
                    <td>{{$mapTechnical->t_description }} </td>
                    <td>{{$mapTechnical->mt_owner }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <div class="container">
        <h2>Update Risk Identification</h2><br><br>
        <form method="POST" action="{{ route('step4.set') }}">
          @csrf
          <table class="table">
            <tbody>
              <tr><td></td>
                <td><h5>Threat Properties</h5></td>
              </tr>
              <tr>
                <td>Area of Concern</td>
                <td><textarea placeholder="Input Area of Concern" name="area_of_concern" class="form-control" required>{{ session('RI.area_of_concern') }}</textarea></td>
              </tr>
              <tr>
                <td>Actor</td>
                <td><input placeholder="Input Actor" name="actor" class="form-control" required value="{{ session('RI.actor') }}"></td>
              </tr>
              <tr>
                <td>Objective</td>
                <td><textarea placeholder="Input Objective" name="objective" class="form-control" required >{{  session('RI.objective')  }}</textarea></td>
              </tr>
              <tr>
                <td>Motive</td>
                <td><textarea placeholder="Input Motive" name="motive" class="form-control" required>{{ session('RI.motive') }}</textarea></td>
              </tr>
              <tr>
                <td>Result</td>
                <td><textarea placeholder="Input Result" name="result" class="form-control" >{{ session('RI.result') }}</textarea></td>
              </tr>
              <tr>
                <td>Security Needs</td>
                <td><textarea placeholder="Input Security Needs" name="security_needs" class="form-control" required>{{ session('RI.security_needs') }}</textarea></td>
              </tr>
              <tr>
                <td>Probability</td>
                <td><select id="probability" class="form-control" name="probability" required>
                  <option value="">Select Probability Chances</option>
                  @foreach(['high','medium', 'low'] as $value)
                      <option value="{{ $value }}" @selected(session('RI.probability') == $value)>
                      {{ $value }}
                      </option>
                  @endforeach
              </select></td>
              </tr>
              <tr>
                <td>Consequence</td>
                <td><textarea placeholder="Input Consequence" name="consequences" class="form-control" required>{{ session('RI.consequences') }}</textarea></td>
              </tr>
              <tr>
                <td>Control</td>
                <td><textarea placeholder="Input Control" name="control" class="form-control" required>{{ session('RI.control') }}</textarea></td>
              </tr>
            </tbody>
          </table>
          <div class="form-group">
            <button type="submit" class="btn btn-info">Ok</button>
          </div>
        </form>
      </div>
      <br>
      <div class="container">
        <h2>Update Impact Severity</h2>
        <form method="POST" action="{{ route('step5.set') }}">
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
                            @foreach(['high','medium','low'] as $value)
                                <option value="{{ $value }}" @selected(session('severity.rep_value') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                        <td><select id="rep_score" class="form-control" name="rep_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            @foreach([10,9,8,7,6,5, 4, 3, 2, 1] as $value)
                                <option value="{{ $value }}" @selected(session('severity.rep_score') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Finance</td>
                        <td><select id="financial_value" class="form-control" name="financial_value" required>
                            <option value="">Select Severity Value</option>
                            @foreach(['high','medium','low'] as $value)
                                <option value="{{ $value }}" @selected(session('severity.financial_value') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                        <td><select id="financial_score" class="form-control" name="financial_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            @foreach([10,9,8,7,6,5, 4, 3, 2, 1] as $value)
                                <option value="{{ $value }}" @selected(session('severity.financial_score') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Productivity</td>
                        <td><select id="productivity_value" class="form-control" name="productivity_value" required>
                            <option value="">Select Severity Value</option>
                            @foreach(['high','medium','low'] as $value)
                                <option value="{{ $value }}" @selected(session('severity.productivity_value') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                        <td><select id="productivity_score" class="form-control" name="productivity_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            @foreach([10,9,8,7,6,5, 4, 3, 2, 1] as $value)
                                <option value="{{ $value }}" @selected(session('severity.productivity_score') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Safety and Health</td>
                        <td><select id="safety_value" class="form-control" name="safety_value" required>
                            <option value="">Select Severity Value</option>
                            @foreach(['high','medium','low'] as $value)
                                <option value="{{ $value }}" @selected(session('severity.safety_value') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                        <td><select id="safety_score" class="form-control" name="safety_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            @foreach([10,9,8,7,6,5, 4, 3, 2, 1] as $value)
                                <option value="{{ $value }}" @selected(session('severity.safety_score') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Fines and Legal Sanctions</td>
                        <td><select id="fines_value" class="form-control" name="fines_value" required>
                            <option value="">Select Severity Value</option>
                            @foreach(['high','medium','low'] as $value)
                                <option value="{{ $value }}" @selected(session('severity.fines_value') == $value)>
                                {{ $value }}
                                </option>
                            @endforeach
                        </select></td>
                        <td><select id="fines_score" class="form-control" name="fines_score" onchange="updateRRScore()" required>
                            <option value="">Select Severity Score</option>
                            @foreach([10,9,8,7,6,5, 4, 3, 2, 1] as $value)
                            <option value="{{ $value }}" @selected(session('severity.fines_score') == $value)>
                              {{ $value }}
                            </option>
                          @endforeach
                        </select></td>
                    </tr>
                    <tr>
                        <td>Relative Risk Score
                        </td>
                        <td>
                        </td>
                        <td><input type="text" name="rr_score" class="form-control" value="{{ session('severity.rr_score') }}" readonly required>
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
                <button type="submit" class="btn btn-info">Ok</button>
            </div>
        </form>
    </div>
    <div class="container">
        <br><br>
        <form method="POST" action="{{ route('update.save', $asset->asset_id) }}">
            @csrf
            <center><div class="form-group">
                <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </center>
        </form>
    </div>

    <script>
        // Function to calculate and update the Relative Risk Score
        function updateRRScore() {
            // Get the selected values of safety_score and fines_score
            var repScore = parseInt(document.getElementById('rep_score').value) || 0;
            var financeScore = parseInt(document.getElementById('financial_score').value) || 0;
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