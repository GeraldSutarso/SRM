@extends('layout.main') 
@section('content')
<div class="container">
  <h2>Step 4: Fill In Risk Identification</h2>
  <form method="POST" action="{{ route('step4.post') }}">
    @csrf
    <table class="table">
      <tbody>
        <tr>
          <td>Threat Properties</td>
        </tr>
        <tr>
          <td>Area of Concern</td>
          <td><textarea placeholder="Input Area of Concern" name="concern" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Actor</td>
          <td><textarea placeholder="Input Actor" name="actor" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Objective</td>
          <td><textarea placeholder="Input Objective" name="objective" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Motive</td>
          <td><textarea placeholder="Input Motive" name="motive" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Result</td>
          <td><textarea placeholder="Input Result" name="result" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Security Needs</td>
          <td><textarea placeholder="Input Security Needs" name="needs" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Possibility</td>
          <td><textarea placeholder="Input Possibility" name="possibility" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Consequence</td>
          <td><textarea placeholder="Input Consequence" name="consequence" class="form-control" required></textarea></td>
        </tr>
        <tr>
          <td>Controll</td>
          <td><textarea placeholder="Input Control" name="control" class="form-control" required></textarea></td>
        </tr>
      </tbody>
    </table>
    <div class="form-group">
      <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
      <button type="submit" class="btn btn-primary">Next</button>
    </div>
  </form>
</div>
@endsection