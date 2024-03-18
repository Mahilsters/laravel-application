@extends('students.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $students->name }}</h5>
        <p class="card-text">Address : {{ $students->address }}</p>
        <p class="card-text">Contact : {{ $students->contact }}</p>
  </div>
  <hr>
  <div class="card">
    <div class="card-header">
        <h2>QR Code</h2>
    </div>
    <div class="card-body">
        {!! QrCode::size(300)->generate(route('students.show', $students))!!}
    </div>
    </div>
  </div>
</div>