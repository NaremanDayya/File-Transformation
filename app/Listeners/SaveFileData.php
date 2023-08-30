<?php

namespace App\Listeners;

use App\Events\NewFileDownloaded;
use App\Models\FileLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveFileData
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewFileDownloaded $event): void
    {
        $request= request();
        // dd($event->file);
        $file = $event->file;
        $ip = $request->ip();
        $user_agent = $request->header('User-Agent');

        FileLog::create([
            'file_id' => $file->id,
            'ip_address' => $ip,
            'user_agent' => json_encode($user_agent),
            'time' =>now(),
        ]);
        $file->downloads++;
        $file->save();
        
    
    }
}
