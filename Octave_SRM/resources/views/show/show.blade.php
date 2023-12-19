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
          <div class="container">
            <h2>Asset Mapping</h2>
            <h2>Map Humans</h2>
            <table>
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Owner</th>
                </tr>
            @foreach ($mapHumanData as $mapHuman)
                <tr>
                    <td>{{$mapHuman->h_location }} </td>
                    <td>{{$mapHuman->h_description }} </td>
                    <td>{{$mapHuman->mh_owner }} </td>
                </tr>
            @endforeach
            </table>
            <h2>Map Physicals</h2>
            <table>
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Owner</th>
                </tr>
            @foreach ($mapPhysicalData as $mapPhysical)
                <tr>
                    <td>{{$mapPhysical->p_location }} </td>
                    <td>{{$mapPhysical->p_description }} </td>
                    <td>{{$mapPhysical->mp_owner }} </td>
                </tr>
            @endforeach
            </table>
            <h2>Map Technicals</h2>
            <table>
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Owner</th>
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
                      <td><h5>Impact Area</h5></td>
                      <td><h5>Value</h5></td>
                      <td><h5>Score</h5></td>
                  </tr>
                  <tr>
                      <td>Reputation and Consumer Trust</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->rep_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->rep_score }}</td>
                  </tr>
                  <tr>
                      <td>Finance</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->financial_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->financial_score }}</td>
                  </tr>
                  <tr>
                      <td>Productivity</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->productivity_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->productivity_score }}</td>
                  </tr>
                  <tr>
                      <td>Safety and Health</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->safety_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->safety_score }}</td>
                  </tr>
                  <tr>
                      <td>Fines and Legal Sanctions</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->fines_value }}</td>
                      <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->fines_score }}</td>
                  </tr>
                  <tr>
                      <td>Relative Risk Score
                      </td>
                      <td>
                      </td>
                      {{-- <td><input type="text" name="rr_score" class="form-control" value="{{ old('rr_score') }}" readonly required> --}}
                        <td style="border: 1px solid #dddddd; background-color: #ffff; padding: 8px;">{{ $severity->rr_score }}</td>
                      </td>
                  </tr>
               </tbody>
              @endforeach
            </table>

            {{-- Score Resiko Relatif --}}
            <h2>Relative Risk Score</h2>

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
                  <tr> 
                    <th rowspan="2">Probability</th>
                    <th colspan="3" style="text-align: center;">Relative Risk Score</th>
                  </tr>
                  <tr>
                    <th style="text-align: center;">30-45</th>
                    <th style="text-align: center;">16-29</th>
                    <th style="text-align: center;">0-15</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>High</td>
                    <td>(Category 1)<br>Mitigate</td>
                    <td>(Category 2)<br>Mitigate/Postpone</td>
                    <td>(Category 2)<br>Mitigate/Postpone</td>
                  </tr>
                  <tr>
                    <td>Medium</td>
                    <td>(Category 2)<br>Mitigate/Postpone</td>
                    <td>(Category 2)<br>Mitigate/Postpone</td>
                    <td>(Category 3)<br>Postpone/Accept</td>
                  </tr>
                  <tr>
                    <td>Low</td>
                    <td>(Category 3)<br>Postpone/Accept</td>
                    <td>(Category 3)<br>Postpone/Accept</td>
                    <td>(Category 4)<br>Accept</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

            {{-- <table border="1">
                <caption>Tabel 6. Pendekatan Mitigasi — Data Mahasiswa</caption>
                <tr>
                    <th>Risk Area</th>
                    <th>Asset Information</th>
                    <th>Aksi</th>
                    <th>Container</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Penyebaran data mahasiswa pada pihak-pihak yang memiliki hak akses</td>
                    <td>Category 2-Mitigasi/Menunda</td>
                    <td>Kontainer</td>
                </tr>
                <tr>
                    <td>Staf ICT Fasilkom Unsri</td>
                    <td>Mengedukasi staf melalui program kesadaran keamanan informasi.</td>
                    <td>Kontrol</td> 
                </tr> 
                <tr> 
                    <td>Basis data</td> 
                    <td>Mengenkripsi kata sandi mahasiswa, melakukan pembatasan akses, dan membuat batasan durasi sesi login.</td> 
                    <td></td> 
                </tr> 
            </table> --}}

              

      </div>
      <br>
      @if(!isset($excludeNavbar))
      <a href="{{ route('genPDF',$asset->asset_id) }}" class="btn btn-success">Generate PDF</a>
      @endif
      <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>