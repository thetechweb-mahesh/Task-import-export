<?php
namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DataExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $formats;

    public function __construct(array $formats)
    {
        $this->formats = $formats;
    }

    public function handle()
    {
        foreach($this->formats as $format){
            $data = User::export($format);
            $filename = storage_path("app/exports/users_" . date('Ymd_His') . ".$format");
            file_put_contents($filename, $data);
        }
    }
}
