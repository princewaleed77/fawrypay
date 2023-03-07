@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <ul class="list-group">
        @foreach ($activities as $activity)
            <li class="list-group-item"> {{ $activity->id }}</li>
            <li class="list-group-item"> {{ $activity->name }}</li>
            <li class="list-group-item"> {{ $activity->address }}</li>
            <li class="list-group-item"> {{ $activity->details }}</li>
            <li class="list-group-item"> {{ $activity->fees }}</li>
        @endforeach
    </ul>
@endsection

@section('header')
@endsection
