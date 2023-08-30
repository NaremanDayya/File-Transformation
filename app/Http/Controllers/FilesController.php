<?php

namespace App\Http\Controllers;

use App\Events\NewFileDownloaded;
use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        $success = session('success');
        return view('index', compact('files', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'files' => new File(),
        ])->with('success', 'File Created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FileRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $path = File::uploadFile($file);
            $validated['file_path'] = basename($path);
        }
        $validated['hash_code']=Str::random(10) ;
        $file = File::create($validated);
        event(new NewFileDownloaded($file));
        return redirect()->route('files.index')
            ->with('success', 'File Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return view('show')->with([
            'files' => $file,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        return view('edit')->with([
            'files' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FileRequest $request, string $id)
    {
        $validated = $request->validated();
        $file = File::findOrFail($id);
        if ($request->hasFile('path')) {
            $new_file = $request->file('path');
            $path = File::uploadFile($new_file);
            $validated['file_path'] = $path;
        }
        $old = $file->file_path;
        $file->update($validated);

        if ($old && $old != $file->file_path) {
            File::deleteFile($old);
        }
        Session::flash('success', 'File Updated');
        return Redirect::route('files.index');
    }

    public function share($hash_code)
    {
        $file = File::where('hash_code','=',$hash_code)->first();
        // $original =$file->getOriginalFileName($file);
        if($file){
        // File::retrievePublicPath($fileName);
        $url = URL::temporarySignedRoute('files.download',
         now()->addMinutes(5),
         ['hash_code' => $hash_code]);
    
        return view('show', [
            'files' => $file,
            'url' => $url,
            'hash_code' => $hash_code,
            // 'original'=> $original,
        ]);
    }else{
       return 'Sorry ,The File Not Found';
    }}

    public function download($hash_code)
{
    // $file = File::findOrFail($id);
    // $fileName = basename($file->file_path);
    // File::retrievePublicPath($fileName);
    // // return back();
    $file = File::where('hash_code','=',$hash_code)->first();
    if($file){
        $fileName =$file->file_path;
        $filePath = File::retrievePublicPath($fileName);
        Event::dispatch(new NewFileDownloaded($file));
        return response()->download($filePath);        // event(new NewFileDownloaded($file));



}
else{
  return  'Sorry ,The File Not Found';
}
    // echo $fileName;

}


    // public function download(Request $request ,$id=null)
    // {
    //     $fileName = $request->input('fileName');

    //     if ($id) {
    //         $file = File::findOrFail($id);
    //         $fileName = basename($file->file_path);
    //     }
    
    //     elseif (!$fileName && $id == null) {
    //         abort(400, 'Invalid request. Please provide a file name or an ID.');
    //     }
    //    File::retrievePublicPath($fileName);
    //    return back();
    // }
  
    public function downloadByUrl()
    {
        return view('download');

    }

    public function downloadUrl(Request $request )
    {
        
    $fileCode = $request->input('fileCode');
    $file = File::where('hash_code',$fileCode)->first();
    if($file){
            $fileName =$file->file_path;
            $filePath = File::retrievePublicPath($fileName);
            event(new NewFileDownloaded($file));
            return response()->download($filePath);


    }
    else{
        'Sorry ,The File Not Found';
    }
    // echo $fileName;
    // $publicPath = 'storage/files/' . $fileName;

    // if (file_exists($publicPath)) {
    //     return response()->download(public_path($publicPath));        //    dd($filePath);

    // } else {
    //     abort(404, 'File not found.');
    // }
    
    // return back();

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
        if ($file->file_path) {
            file::deleteFile($file->file_path);
        }
        return redirect(route('files.index'))
            ->with('success', 'File Deleted ');
    }
}
