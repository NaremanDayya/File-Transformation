<x-layout>
    <div class="container">
        <form action="{{ route("files.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('form',[
                'button' => 'Add File'
            ])
        </form>
    </div>
</x-layout>