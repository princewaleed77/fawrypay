@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
    @foreach ($activities as $item)
        <ul class="list-group">
            <li class="list-group-item">{{ $item->id }}</li>
            <li class="list-group-item">{{ $item->name }}</li>
            <li class="list-group-item">{{ $item->address }}</li>
            <li class="list-group-item">{{ $item->details }}</li>
            <li class="list-group-item">{{ $item->fees }}</li>
        </ul>
    @endforeach
@endsection

@section('header')
    
@endsection
