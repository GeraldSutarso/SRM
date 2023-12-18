@extends('layout.main')

@section('content')
<h3>Update Container Mapping</h3>
<form id="mappingForm" method="POST" action="{{ route('step3.save', $asset->asset_id) }}">
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
    <td><button type="button" class="btn btn-danger deleteRow deleteH" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
      </svg></button></td>
</tr>
@endforeach
</table>
<button type="button" class="btn btn-success" id="HaddButton">+</button>
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
    <td><button type="button" class="btn btn-danger deleteRow" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
      </svg></button></td>
</tr>
@endforeach
</table>
<button type="button" class="btn btn-success" id="PaddButton">+</button>
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
    <td><button type="button" class="btn btn-danger deleteRow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
      </svg></button></td>
</tr>
@endforeach
</table>
<button type="button" class="btn btn-success" id="TaddButton">+</button>
<br>
<br>
<a class="btn btn-secondary d-inline-block" href="{{ route('update', $asset->asset_id) }}" id="button-update">Back</a>
<button type="submit" class="btn btn-success d-inline-block">Save</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

 // Get the button element by id
 var HaddButton = $("#HaddButton");
 var PaddButton = $("#PaddButton");
 var TaddButton = $("#TaddButton");
 var delRow
// Add a click event listener to the button
HaddButton.on("click", function() {
  // Get the current table based on the button clicked
  var currentTable = $('#humanTable');

  // Clone the last row of the table
  var newRow = currentTable.find("tr:last").clone();

  // Clear the input values of the new row
  newRow.find("input, textarea, select").val("");

  // Append the new row to the table
  currentTable.append(newRow);
  var rowCount = $("#humanTable tr").length;

// If there is only one row left, disable the delete button
if (rowCount < 3) {
  $(".deleteH").prop("disabled", true);
}
if (rowCount >= 3){
    $(".deleteH").prop("disabled", false);
}

});
PaddButton.on("click", function() {
  // Get the current table based on the button clicked
  var currentTable = $('#physicalTable');

  // Clone the last row of the table
  var newRow = currentTable.find("tr:last").clone();

  // Clear the input values of the new row
  newRow.find("input, textarea, select").val("");

  // Append the new row to the table
  currentTable.append(newRow);
});
TaddButton.on("click", function() {
  // Get the current table based on the button clicked
  var currentTable = $('#technicalTable');

  // Clone the last row of the table
  var newRow = currentTable.find("tr:last").clone();

  // Clear the input values of the new row
  newRow.find("input, textarea, select").val("");

  // Append the new row to the table
  currentTable.append(newRow);
});
var deleteButtons = $(document).on("click", ".deleteRow", function() {
  // Call the deleteRow function with the button as an argument
  deleteRow(this);
});

// Define a function to delete a row
function deleteRow(button) {
  // Get the parent row of the button
  var row = $(button).closest("tr");

  // Remove the row from the table
  row.remove();
    // Check the number of rows in the table
    var rowCount = $("#humanTable tr").length;

// If there is only one row left, disable the delete button
if (rowCount < 3) {
  $(".deleteH").prop("disabled", true);
}
if (rowCount >= 3){
    $(".deleteH").prop("disabled", false);
}
}
</script>
@endsection