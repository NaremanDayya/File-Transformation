<x-layout>


    <x-alert name="success" class="alert-success"></x-alert>
    @if ($errors->any())
        <x-alert name="danger" class="alert-danger"></x-alert>
    @endif
    {{-- <x-alert name="success" /> --}}
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
        @foreach ($files as $file)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $file->title }} - {{ $file->description }}</h5>
                    {{-- <p class="card-text"> {{ $file->description }}</p> --}}
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="{{ route('files.download', $file->hash_code) }}" class="btn btn-primary">Download</a>
                        <a href="{{ route('files.share', $file->hash_code) }}" class="btn btn-primary">Share</a>
                        <a href="{{ route('files.edit', $file->id) }}" class="btn btn-dark">Edit</a>
                        <form action="{{ route('files.destroy', $file->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

</x-layout>
