@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <ul class="list-group">
        @foreach ($activities as $item)
            <li class="list-group-item">{{ $item->id }}</li>
            <li class="list-group-item">{{ $item->name }}</li>
            <li class="list-group-item">{{ $item->address }}</li>
            <li class="list-group-item">{{ $item->details }}</li>
            <li class="list-group-item">{{ $item->fees }}</li>
        @endforeach
    </ul>
@endsection

@section('header')
@endsection
