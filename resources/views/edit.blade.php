@extends('layout')
@section('title','Edit File')
@section('content')
    <div class="container">
        <form action="{{ route("files.update", $files->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('form',[
                'button' => 'Edit File'
            ])
            </form>
    </div>
@endsection