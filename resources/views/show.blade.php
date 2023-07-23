@extends('layout')
@section('title', 'Add files')
@section('content')
    <div class="container">
        <h1> file Details: {{ $files->title }} </h1>
        <h3>{{ $files->descripton }}</h3>

        <div class="row">
            <div class="col-md-3">
                <p>you can downloaad file by clicking the link</p>
                <a href="{{ $url }}">{{ $url }}</a>
            </div>

        </div>
    </div>
@endsection
