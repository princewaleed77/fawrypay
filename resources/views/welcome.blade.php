@extends('layouts.master')

@section('content')
<div class="container">

    <table class="table table-striped table-hover table-info">
        <thead>
            <tr>
                <th>UserId</th>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
            
        </thead>
        <tbody>

            <tr>
                <td>{{ $post->userId }}</td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
            </tr>
        
        </tbody>
    </table>
</div>

@endsection