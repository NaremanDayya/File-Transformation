<x-layout>

    <div class="container">
        <h1> file Name: {{ $files->title }} </h1>
        <h3>{{ $files->descripton }}</h3>
        {{-- <h3>{{ $original }}</h3> --}}
        <div class="row">
            <div class="col-md-3">
                <p>you can download file by clicking the link</p>
                <a href="{{ $url }}">{{ $url }}</a>
                <p>you can share file code below with others </p>
                <a href="#">{{ $hash_code}}</a>
            
            </div>
        </div>

        <h2>Download Details: {{ $files->downloads }} Download</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>IP Address</th>
                    <th>User Agent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($downloadDetails as $detail)
                    <tr>
                        <td>{{ $detail->time }}</td>
                        <td>{{ $detail->ip_address }}</td>
                        <td>{{ $detail->user_agent }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>