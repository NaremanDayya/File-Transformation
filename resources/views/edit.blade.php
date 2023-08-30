<x-layout>
    <div class="container">
        <form action="{{ route("files.update", $files->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('form',[
                'button' => 'Edit File'
            ])
            </form>
    </div>
</x-layout>