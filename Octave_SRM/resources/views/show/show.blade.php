@extends('layout.main')

@section('content')
<<<<<<< HEAD
<div class="container">
    <h3>Asset Details</h3>&ensp;
=======
<div class="container bg-white"><br>
    <h3><center>Asset Details</center></h3><br><br>
>>>>>>> b37a2530ffadbaec4b61c2122f0e8c7d821b5f2e

{{-- priority dan severity biar gw yg buat soalnya agak beda --}}

    {{-- ini kyk risk identification tapi asset, mapping dll --}}

    {{-- Asset Informations Table --}}
    <h4>Asset Information</h4>
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
    </table>

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