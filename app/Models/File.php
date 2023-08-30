<?php

namespace App\Models;

use App\Events\NewFileDownloaded;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    public static string $disk = 'storage';

    use HasFactory;
    protected $fillable = [
        'title', 'description', 'file_path', '_Token', 'hash_code'
    ];

    protected $casts = [
        'downloads' => 'integer', 
    ];

    public static function uploadFile($file)
    {

        $path = $file->store('/files', [
            'disk' => self::$disk,
        ]);
        return $path;
        // $path = Storage::put('files/',$file);
        // return $path;

    }
    public static function deleteFile($path)
    {
        Storage::delete($path);
    }
    
    public static function retrievePublicPath($fileName)
    {
        $filePath = storage_path('app/files/' . $fileName);
        if (file_exists($filePath)) {
            return $filePath;
        } else {
            abort(404, 'File not found.');
        }
        // if (file_exists($filePath)) {
        //     event(new NewFileDownloaded($file));
        //     return response()->download($filePath);
        //     //    dd($filePath);
        // } else {
        //     abort(404, 'File not found.');
        // }
    }
}
