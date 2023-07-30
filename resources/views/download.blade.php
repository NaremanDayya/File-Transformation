<x-layout>
@if (session()->has("fail"))
<div class="alert alert-danger">
  {{session("danger")}}
</div>
@endif

<form action="{{ route('files.downloadUrl') }}" method="POST">
    @csrf
    <div class="container">
    <div class="mb-3">
        <label for="fileName" name="fileName" class="form-label">File Name</label>
        <input type="text" class="form-control" name="fileName" id="fileName" name="fileName" placeholder="Enter file URL">
    </div>
    <button type="submit" class="btn btn-primary">Download</button>
</div>

</form>
</x-layout>