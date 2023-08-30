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
        <label for="fileCode" name="fileCode" class="form-label">File Code</label>
        <input type="text" class="form-control" name="fileCode" id="fileCode" name="fileCode" placeholder="Enter file URL">
    </div>
    <button type="submit" class="btn btn-primary">Download</button>
</div>

</form>
</x-layout>