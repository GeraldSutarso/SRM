@extends('layout.main')

@section('content')
<h3>Update Container Mapping</h3>
<form id="mappingForm" method="POST" action="{{ route('step3.save') }}">
@csrf
<h5>Human Mapping</h5>
<table class="table table-bordered table-light table-hover table-sm table-responsive" id = "humanTable">
    <tr>
        <th>Location</th>
        <th>Description</th>
        <th>Owner</th>
        <th>Action</th>
    </tr>
@foreach ($mapHumanData as $mapHuman)
<tr>
    <!-- Use a select with options for location -->
    <td>
        <select name="h_location[]">
            <!-- Use the old value as the selected option -->
            <option value="Internal" @if ($mapHuman->h_location == 'Internal') selected @endif>Internal</option>
            <option value="External" @if ($mapHuman->h_location == 'External') selected @endif>External</option>
        </select>
    </td>
    <!-- Use a textarea for description -->
    <td><textarea name="h_description[]">{{$mapHuman->h_description }} </textarea></td>
    <!-- Use an input field for owner -->
    <td><input type="text" name="mh_owner[]" value="{{$mapHuman->mh_owner }} "></td>
    <!-- Use a button to delete the row -->
    <td><button onclick="deleteRow(this)">Delete</button></td>
</tr>
@endforeach
</table>
<button type="button" class="btn btn-success" onclick="addRow('humanTable')">+</button>
<br><br>
<h5>Physical Mapping</h5>
<table class="table table-bordered table-light table-hover table-sm table-responsive" id ="physicalTable">
    <tr>
        <th>Location</th>
        <th>Description</th>
        <th>Owner</th>
        <th>Action</th>
    </tr>
@foreach ($mapPhysicalData as $mapPhysical)
<tr>
    <!-- Use a select with options for location -->
    <td>
        <select name="p_location[]">
            <!-- Use the old value as the selected option -->
            <option value="Internal" @if ($mapPhysical->p_location == 'Internal') selected @endif>Internal</option>
            <option value="External" @if ($mapPhysical->p_location == 'External') selected @endif>External</option>
        </select>
    </td>
    <!-- Use a textarea for description -->
    <td><textarea name="p_description[]">{{$mapPhysical->p_description }} </textarea></td>
    <!-- Use an input field for owner -->
    <td><input type="text" name="mp_owner[]" value="{{$mapPhysical->mp_owner }} "></td>
    <!-- Use a button to delete the row -->
    <td><button onclick="deleteRow(this)">Delete</button></td>
</tr>
@endforeach
</table>
<button type="button" class="btn btn-success" onclick="addRow('physicalTable')">+</button>
<br><br>
<h5>Technical Mapping</h5>
<table class="table table-bordered table-light table-hover table-sm table-responsive" id = "technicalTable">
    <tr>
        <th>Location</th>
        <th>Description</th>
        <th>Owner</th>
        <th>Action</th>
    </tr>
@foreach ($mapTechnicalData as $mapTechnical)
<tr>
    <!-- Use a select with options for location -->
    <td>
        <select name="t_location[]">
            <!-- Use the old value as the selected option -->
            <option value="Internal" @if ($mapTechnical->t_location == 'Internal') selected @endif>Internal</option>
            <option value="External" @if ($mapTechnical->t_location == 'External') selected @endif>External</option>
        </select>
    </td>
    <!-- Use a textarea for description -->
    <td><textarea name="t_description[]">{{$mapTechnical->t_description }} </textarea></td>
    <!-- Use an input field for owner -->
    <td><input type="text" name="mt_owner[]" value="{{$mapTechnical->mt_owner }} "></td>
    <!-- Use a button to delete the row -->
    <td><button onclick="deleteRow(this)">Delete</button></td>
</tr>
@endforeach
</table>
<button type="button" class="btn btn-success" onclick="addRow('technicalTable')">+</button>
<br>
<br>
<a class="btn btn-secondary d-inline-block" href="{{ route('update', $asset->asset_id) }}" id="button-update">Back</a>
<button type="submit" class="btn btn-success d-inline-block">Save</button>
</form>
<script>
    function addRow(tableId) {
    // Get the table element by id
    var table = document.getElementById(tableId);

    // Get the last table row
    var lastRow = table.rows[table.rows.length - 1];

    // Clone the last row
    var newRow = lastRow.cloneNode(true);

    // Append the new row to the table body
    table.tBodies[0].appendChild(newRow);
}
</script>
@endsection