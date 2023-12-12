@extends('layout.main')

@section('content')

<div class="container">
    <h3>Asset Details</h3>&ensp;
<div class="container bg-white"><br>
    <h3><center>Asset Details</center></h3><br><br>

{{-- priority dan severity biar gw yg buat soalnya agak beda --}}

    {{-- ini kyk risk identification tapi asset, mapping dll --}}

    {{-- Asset Informations Table --}}
    <h4 style="font-weight: bold">Asset Information</h4>
    <table class="table">
        <tr>
            <td><h6>Critical Asset :</h6></td>
            <td>{{ $asset->asset_name }}</td>
        </tr>
        <tr>
            <td><h6>Rationale for Selection :</h6></td>
            <td>{{ $asset->rationale_for_select }}</td>
        </tr>
        <tr>
            <td><h6>Description :</h6></td>
            <td>{{ $asset->asset_desc }}</td>
        </tr>
        <tr>
            <td><h6>Owner :</h6></td>
            <td>{{ $asset->owner }}</td>
        </tr>
        <tr>
            <td><h6>Department :</h6></td>
            <td>{{ $asset->a_department }}</td>
        </tr>
    </table>

    {{-- Security Requirements Table --}}
    <h5>Security Requirement</h5>
    <table class="table">
        <tr>
            <td><h6>Confidentiality :</h6></td>
            <td>{{ $asset->SR_confidentiality }}</td>
        </tr>
        <tr>
            <td><h6>Integrity :</h6></td>
            <td>{{ $asset->SR_integrity }}</td>
        </tr>
        <tr>
            <td><h6>Availability :</h6></td>
            <td>{{ $asset->SR_availability }}</td>
        </tr>
        <tr>
            <td><h6>Most Important Security Requirement :</h6></td>
            <td>{{ $asset->most_important_SR }}</td>
        </tr>
    </table>&ensp;&ensp;

    {{-- Priority of Your Asset Table --}}
    <h4 style="font-weight: bold">Priority of Your Asset</h4>
    <table class="table">
        <tbody>
            <tr>
                <td><h5>Impact Area</h5></td>
                <td><h5>Priority</h5></td>
            </tr>
            <tr>
                <td>Reputation and Consumer Trust</td>
                <td>{{ $priority->trust }}</td>
                </select></td>
            </tr>
            <tr>
                <td>Finance</td>
                <td>{{ $priority->finance }}</td>
                </select></td>    
            </tr>
            <tr>
                <td>Productivity</td>
                <td>{{ $priority->productivity }}</td>
                </select></td>    
            </tr>
            <tr>
                <td>Safety and Health</td>
                <td>{{ $priority->safety }}</td>
                </select></td>
            </tr>
            <tr>
                <td>Fines and Legal Sanctions</td>
                <td>{{ $priority->fines }}</td>
                </select></td>
            </tr>
        </tbody>
    </table>&ensp;&ensp;
    

    {{-- Asset Mapping Table --}}
    <h4 style="font-weight: bold">Asset Mapping</h4>
    <h5>Technical Asset Mapping</h5>
    <table class="table">
        <tr>
            <td><h6>Location :</h6></td>
            <td>{{ $asset->rationale_for_select }}</td>
        </tr>
        <tr>
            <td><h6>Description :</h6></td>
            <td>{{ $asset->rationale_for_select }}</td>
        </tr>
        <tr>
            <td><h6>Owner :</h6></td>
            <td>{{ $asset->asset_desc }}</td>
        </tr>
    </table>&ensp;&ensp;

    <h5>Physical Asset Mapping</h5>
    <table class="table">
        <tr>
            <td><h6>Location :</h6></td>
            <td>{{ $asset->asset_name }}</td>
        </tr>
        <tr>
            <td><h6>Description :</h6></td>
            <td>{{ $asset->rationale_for_select }}</td>
        </tr>
        <tr>
            <td><h6>Owner :</h6></td>
            <td>{{ $asset->asset_desc }}</td>
        </tr>
    </table>&ensp;&ensp;

    <h5>Human Asset Mapping</h5>
    <table class="table">
        <tr>
            <td><h6>Location :</h6></td>
            <td>{{ $asset->asset_name }}</td>
        </tr>
        <tr>
            <td><h6>Description :</h6></td>
            <td>{{ $asset->rationale_for_select }}</td>
        </tr>
        <tr>
            <td><h6>Owner :</h6></td>
            <td>{{ $asset->asset_desc }}</td>
        </tr>
    </table>&ensp;&ensp;
    
    {{-- Risk Identifications Table --}}
    <h4 style="font-weight: bold">Risk Identifications</h4>
    <table class="table">
        @foreach ($RIs as $RI)
        <tbody>
            <tr><td></td>
              <td><h5>Threat Properties</h5></td>
            </tr>
            <tr>
              <td>Area of Concern</td>
              <td>{{ $RI->area_of_concern }}</td>
            </tr>
            <tr>
              <td>Actor</td>
              <td>{{ $RI->actor }}</td>
            </tr>
            <tr>
              <td>Objective</td>
              <td>{{ $RI->objective }}</td>
            </tr>
            <tr>
              <td>Motive</td>
              <td>{{ $RI->motive }}</td>
            </tr>
            <tr>
              <td>Result</td>
              <td>{{ $RI->result }}</td>
            </tr>
            <tr>
              <td>Security Needs</td>
              <td>{{ $RI->security_needs }}</td>
            </tr>
            <tr>
              <td>Probability</td>
              <td>{{ $RI->probability }}</td>
            </tr>
            <tr>
              <td>Consequence</td>
              <td>{{ $RI->consequences }}</td>
            </tr>
            <tr>
              <td>Control</td>
              <td>{{ $RI->control }}</td>
            </tr>
          </tbody>
        @endforeach
    </table>&ensp;&ensp;

    {{-- Severities Table --}}
    <h4 style="font-weight: bold">Severities</h4>
    <table class="table">
        @foreach ($severityData as $severity)
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
        @endforeach
    </table>
</div>
@endsection