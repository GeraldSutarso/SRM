@extends('layout.main')

@section('content')
<div class="container bg-white"><br>
    <h3><center>Asset Details</center></h3><br><br>

{{-- priority dan severity biar gw yg buat soalnya agak beda --}}

    {{-- ini kyk risk identification tapi asset, mapping dll --}}

    {{-- Risk Identifications Table --}}
    <h5>Risk Identifications</h5>
    <table class="table">
        @foreach ($RIs as $RI)
        <tr>
            <td><h6>Area of Concern :</h6></td>
            <td>{{ $RI->area_of_concern }}</td>
        </tr>
            <td><h6>Actor :</h6></td>
            <td>{{ $RI->actor }}</td>
        </tr>
        <tr>

        </tr>
        @endforeach
    </table>

    {{-- Severities Table --}}
    <h2>Severities</h2>
    <table>
        @foreach ($severityData as $severity)
        <tr>
            {{--  --}}
        </tr>
        @endforeach
    </table>
</div>
@endsection
