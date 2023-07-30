<x-layout>
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Your Favorite Place For Share Files With Your Friends </h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5 single-line">Our website made with love to share files♥ <br>just upload files and share download links with others</p>
                <a class="btn btn-primary btn-xl" href="{{ route('files.create') }}">Upload Files</a>
            </div>
        </div>
    </div>
</x-layout>