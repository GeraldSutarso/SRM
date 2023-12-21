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
          <h2><center>Asset Details</center></h2><br><br>
      
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
        <h4>Security Requirement</h4>
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
          <div class="container">
            <h4 style="font-weight: bold">Asset Mapping</h4>
            <h5 style="margin-top: 10px;">Map Humans</h5>
            <table class="table" style="background-color: #EFEFEF; border-collapse: collapse; width: 100%;">
                <tr style="background-color: #B0A695;">
                    <th style="border: 1px solid #dddddd; padding: 8px;">Location</th>
                    <th style="border: 1px solid #fbf7f7; padding: 8px;">Description</th>
                    <th style="border: 1px solid #fbf7f7; padding: 8px;">Owner</th>
                </tr>
            @foreach ($mapHumanData as $mapHuman)
                <tr>
                    <td>{{$mapHuman->h_location }} </td>
                    <td>{{$mapHuman->h_description }} </td>
                    <td>{{$mapHuman->mh_owner }} </td>
                </tr>
            @endforeach
            </table>
            <h5 style="margin-top: 10px;">Map Physicals</h5>
            <table class="table" style="background-color: #EFEFEF; border-collapse: collapse; width: 100%;">
                <tr style="background-color: #B0A695;">
                    <th style="border: 1px solid #dddddd; padding: 8px;">Location</th>
                    <th style="border: 1px solid #fbf7f7; padding: 8px;">Description</th>
                    <th style="border: 1px solid #fbf7f7; padding: 8px;">Owner</th>
                </tr>
            @foreach ($mapPhysicalData as $mapPhysical)
                <tr>
                    <td>{{$mapPhysical->p_location }} </td>
                    <td>{{$mapPhysical->p_description }} </td>
                    <td>{{$mapPhysical->mp_owner }} </td>
                </tr>
            @endforeach
            </table>
            <h5 style="margin-top: 10px;">Map Technicals</h5>
            <table class="table" style="background-color: #EFEFEF; border-collapse: collapse; width: 100%;">
                <tr style="background-color: #B0A695;">
                    <th style="border: 1px solid #dddddd; padding: 8px;">Location</th>
                    <th style="border: 1px solid #fbf7f7; padding: 8px;">Description</th>
                    <th style="border: 1px solid #fbf7f7; padding: 8px;">Owner</th>
                </tr>
            @foreach ($mapTechnicalData as $mapTechnical)
                <tr>
                    <td>{{$mapTechnical->t_location }} </td>
                    <td>{{$mapTechnical->t_description }} </td>
                    <td>{{$mapTechnical->mt_owner }} </td>
                </tr>
            @endforeach
            </table>
        </div>
          
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
                      <td style="background-color: #B0A695;"><h5>Impact Area</h5></td>
                      <td style="background-color: #B0A695;"><h5>Value</h5></td>
                      <td style="background-color: #B0A695;"><h5>Score</h5></td>
                  </tr>
                  <tr>
                      <td style="background-color: #dfdbd2;">Reputation and Consumer Trust</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->rep_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->rep_score }}</td>
                  </tr>
                  <tr>
                      <td style="background-color: #dfdbd2;">Finance</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->financial_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->financial_score }}</td>
                  </tr>
                  <tr>
                      <td style="background-color: #dfdbd2;">Productivity</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->productivity_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->productivity_score }}</td>
                  </tr>
                  <tr>
                      <td style="background-color: #dfdbd2;">Safety and Health</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->safety_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->safety_score }}</td>
                  </tr>
                  <tr>
                      <td style="background-color: #dfdbd2;">Fines and Legal Sanctions</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->fines_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->fines_score }}</td>
                  </tr>
                  <tr>
                      <td style="background-color: #fff8e9;" >Relative Risk Score
                      </td>
                      <td style="background-color: #fff8e9;">
                      </td>
                      {{-- <td><input type="text" name="rr_score" class="form-control" value="{{ old('rr_score') }}" readonly required> --}}
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->rr_score }}</td>
                      </td>
                  </tr>
               </tbody>
              @endforeach
            </table>

            {{-- Score Resiko Relatif --}}
            <h4>Relative Risk Score</h4>

            {{-- <style>
                table {
                  border-collapse: collapse;
                  width: 100%;
                }
              
                th, td {
                  border: 1px solid #ddd;
                  padding: 8px;
                  text-align: left;
                }
              
                th {
                  background-color: #3498db;
                  color: white;
                }
              
                tr:nth-child(even) {
                  background-color: #ecf0f1;
                }
              
                tr:nth-child(odd) {
                  background-color: #d5eaf8;
                }
              
                tr:hover {
                  background-color: #bdc3c7;
                }
              </style> --}}
              
              <table class="table">
                <thead>
                  <tr style="background-color: #B0A695;">
                    <th>Probability</th>
                    <th style="text-align: center;">30-45</th>
                    <th style="text-align: center;">16-29</th>
                    <th style="text-align: center;">0-15</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td  style="background-color: #dfdbd2;">High</td>
                    <td style="background-color: #ef8f8f;">(Category 1)<br>Mitigate</td>
                    <td style="background-color: #ffe4a4;">(Category 2)<br>Mitigate/Postpone</td>
                    <td style="background-color: #ffe4a4;">(Category 2)<br>Mitigate/Postpone</td>
                  </tr>
                  <tr>
                    <td style="background-color: #dfdbd2;">Medium</td>
                    <td style="background-color: #ffe4a4;">(Category 2)<br>Mitigate/Postpone</td>
                    <td style="background-color: #ffe4a4;">(Category 2)<br>Mitigate/Postpone</td>
                    <td style="background-color: #fffaa3;">(Category 3)<br>Postpone/Accept</td>
                  </tr>
                  <tr>
                    <td style="background-color: #dfdbd2;">Low</td>
                    <td style="background-color: #fffaa3;">(Category 3)<br>Postpone/Accept</td>
                    <td style="background-color: #fffaa3;">(Category 3)<br>Postpone/Accept</td>
                    <td style="background-color: #c1febf;">(Category 4)<br>Accept</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

            <table class="table" border="1">
                <h4>Mitigation Table</h4>
                <tr style="background-color: #dfdbd2;">
                    <th><center>Asset Information : {{ $asset->asset_name }}</center></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="background-color: #B0A695;">Risk Area</th>
                    <th style="background-color: #B0A695;">Action</th>
                </tr>
                <tr>
                    <td>{{ $RI->area_of_concern }}</td>
                    <td>{{ $matrix }}</td>
                </tr>
                <tr>
                    <th style="background-color: #B0A695;">Container</th>
                    <th style="background-color: #B0A695;">Control</th>
                </tr>
                @foreach($RIs as $RI)
                <tr>
                    <td>{{ $RI->actor }}</td>
                    <td>{{ $RI->control }}</td>
                </tr>
                @endforeach
            </table>

              

      </div>
      <br>
      @if(!isset($excludeNavbar))
      <center><a href="{{ route('home') }}" class="btn btn-danger">Back</a> <a href="{{ route('genPDF',$asset->asset_id) }}" class="btn btn-success">Generate PDF</a></center><br><br>
      @endif
      <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>