@extends('layout.main') 
@section('content')

{{-- {{ dd(session()->all()) }} --}}
<div class="container">
  <h2>Step 4: Fill In Risk Identification</h2><br><br>
  <form method="POST" action="{{ route('step4.post') }}">
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
          <td><textarea placeholder="Input Result" name="result" class="form-control" >{{ session('RI.motive') }}</textarea></td>
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
      <a href="{{ route('step3') }}" class="btn btn-secondary">Back</a>
      <button type="submit" class="btn btn-primary">Next</button>
    </div>
  </form>
</div>
@endsection