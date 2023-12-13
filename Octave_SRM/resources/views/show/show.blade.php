<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Octave Allegro | Report System</title>
  </head>
  <body>
    
    @include('partial/navbar')


      <div class="container bg-white"><br>
          <h3><center>Asset Details</center></h3><br><br>
      
      {{-- priority dan severity biar gw yg buat soalnya agak beda --}}
      
          {{-- ini kyk risk identification tapi asset, mapping dll --}}
      
          {{-- Asset Informations Table --}}
        <h4 style="font-weight: bold">Asset Information</h4>
        <table class="table" style="background-color: #EFEFEF; border-collapse: collapse; width: 100%;">
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Critical Asset :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_name }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Rationale for Selection :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->rationale_for_select }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Description :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_desc }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Owner :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->owner }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Department :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->a_department }}</td>
            </tr>
        </table>&ensp;&ensp;

        {{-- Security Requirements Table --}}
        <h5>Security Requirement</h5>
        <table class="table" style="background-color: #EFEFEF; border-collapse: collapse; width: 100%;">
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Confidentiality :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->SR_confidentiality }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Integrity :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->SR_integrity }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Availability :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->SR_availability }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Most Important Security Requirement :</h6></td>
                <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->most_important_SR }}</td>
            </tr>
        </table>&ensp;&ensp;
      
          {{-- Priority of Your Asset Table --}}
            <h4 style="font-weight: bold">Priority of Your Asset</h4>
            <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <tbody>
                    <tr style="background-color: #B0A695;">
                        <td style="border: 1px solid #dddddd; padding: 8px;"><h5>Impact Area</h5></td>
                        <td style="border: 1px solid #dddddd; padding: 8px;"><h5>Priority</h5></td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Reputation and Consumer Trust</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $priority->trust }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Finance</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $priority->finance }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Productivity</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $priority->productivity }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Safety and Health</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $priority->safety }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Fines and Legal Sanctions</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $priority->fines }}</td>
                    </tr>
                </tbody>
            </table>&ensp;&ensp;

          
      
          {{-- Asset Mapping Table --}}
            <h4 style="font-weight: bold">Asset Mapping</h4>

            <h5 style="margin-top: 10px;">Technical Asset Mapping</h5>
            <table class="table" style="background-color: #EFEFEF; border-collapse: collapse; width: 100%;">
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Location :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->rationale_for_select }}</td>
                </tr style="background-color: #EFEFEF;">
                <tr>
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Description :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->rationale_for_select }}</td>
                </tr>
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Owner :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_desc }}</td>
                </tr>
            </table>&ensp;&ensp;

            <h5>Physical Asset Mapping</h5>
            <table class="table" style="border-collapse: collapse; width: 100%;">
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Location :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_name }}</td>
                </tr>
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Description :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->rationale_for_select }}</td>
                </tr>
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Owner :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_desc }}</td>
                </tr>
            </table>&ensp;&ensp;

            <h5>Human Asset Mapping</h5>
            <table class="table" style="border-collapse: collapse; width: 100%;">
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Location :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_name }}</td>
                </tr>
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Description :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->rationale_for_select }}</td>
                </tr>
                <tr style="background-color: #EFEFEF;">
                    <td style="border: 1px solid #dddddd; padding: 8px;"><h6>Owner :</h6></td>
                    <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $asset->asset_desc }}</td>
                </tr>
            </table>&ensp;&ensp;
          
        {{-- Risk Identifications Table --}}
        <h4 style="font-weight: bold">Risk Identifications</h4>
        <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            @foreach ($RIs as $RI)
                <tbody>
                    <tr style="background-color: #B0A695;">
                        <td colspan="2"><h5>Threat Properties</h5></td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Area of Concern</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->area_of_concern }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Actor</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->actor }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Objective</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->objective }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Motive</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->motive }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Result</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->result }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Security Needs</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->security_needs }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Probability</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->probability }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Consequence</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->consequences }}</td>
                    </tr>
                    <tr style="background-color: #EFEFEF;">
                        <td style="border: 1px solid #dddddd; padding: 8px;">Control</td>
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $RI->control }}</td>
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
      <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>