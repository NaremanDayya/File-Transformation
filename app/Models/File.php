<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    public static string $disk = 'storage';

    use HasFactory;
    protected $fillable= [
        'title' ,'descripton','file_path','_Token'
    ];

    public static function uploadFile($file)
    {
        
        $path = $file->store('/files', [
            'disk' => self::$disk,
        ]);
        return $path;
    }
    public static function deleteFile($path)
    {
      return Storage::disk(self::$disk)->delete($path);

    }
}
