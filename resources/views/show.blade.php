<x-layout>

    <div class="container">
        <h1> file Name: {{ $files->title }} </h1>
        <h3>{{ $files->descripton }}</h3>

        <div class="row">
            <div class="col-md-3">
                <p>you can download file by clicking the link</p>
                <a href="{{ $url }}">{{ $url }}</a>
                <p>you can share file name below </p>
                <a href="#">{{ $fileName }}</a>
            
            </div>

        </div>
    </div>
</x-layout>