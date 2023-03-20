@extends('layouts.master')
@section('title')
    Home
@endsection


@section('content')
<div class="container">

    <table class="table table-striped table-hover table-dark">
        <thead>
            <tr>
                <th>UserId</th>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($response as $item)
            
            <tr>
                <td>{{ $item->userId }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->body }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection