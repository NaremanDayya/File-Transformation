<div class="card">
    <div class="card-body">
        <h5 class="card-title"> {{ $file->name }}</h5>
        <p class="card-text"> {{ $file->descripton }}</p>
        <div class="row">
            <div class="col">
                <a href="{{ route('files.show', $file->id) }}" class="btn btn-sm btn-primary">View</a>
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
