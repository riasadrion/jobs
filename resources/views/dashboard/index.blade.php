@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('dashboard-content')
{{Auth::user()->name}} , You are logged in!
@endsection
