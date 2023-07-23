<x-floating-control>
    <x-slot:label>
        <label for="title">File Title</label>
    </x-slot:label>
    <x-input name="title" :value="$files->title" placeholder="File Title"></x-input>
    <x-input-error name="title"></x-input-error>
</x-floating-control>


<x-floating-control>
    <x-slot:label>
        <label for="description">description</label>
    </x-slot:label>
    <x-input name="description" :value="$files->description" placeholder="File description"></x-input>
    <x-input-error name="description"></x-input-error>
</x-floating-control>


<x-floating-control>
    <x-slot:label>
        <label for="path">File</label>
    </x-slot:label>
    <x-input type="file" name="path" :value="$files->path" placeholder="File Path">
    </x-input>
    <x-input-error name="path"></x-input-error>
</x-floating-control>
<button type="submit" class="btn btn-primary">{{ $button }}</button>
