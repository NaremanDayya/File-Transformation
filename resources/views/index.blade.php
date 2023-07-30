<x-layout>


    <x-alert name="success"></x-alert>
    @if ($errors->any())
        <x-alert name="danger"></x-alert>
    @endif
    {{-- <x-alert name="success" /> --}}
    <div class="row">

        @foreach ($files as $file)
            {{-- حجزنا 3 اعمدة * 4صفوف يعني 12   --}}
            <div class="col-md-3">
                {{-- <x-card :file="$file"></x-card> --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $file->title }}</h5>
                        <p class="card-text"> {{ $file->description }}</p>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('files.download',$file->id) }}" class="btn btn-sm btn-primary">Download</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('files.share', $file->id) }}"
                                    class="btn btn-sm btn-primary">Share</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('files.edit', $file->id) }}" class="btn btn-sm btn-dark">Edit</a>
                            </div>

                            <div class="col">
                                <form action="{{ route('files.destroy', $file->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    </div>
</x-layout>