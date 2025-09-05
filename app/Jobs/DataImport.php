<?php
namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DataImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $format;

    public function __construct($file, $format)
    {
        $this->file = $file;
        $this->format = $format;
    }

    public function handle()
    {
        $path = storage_path("app/" . $this->file);
        User::import($path, $this->format);
    }
}
