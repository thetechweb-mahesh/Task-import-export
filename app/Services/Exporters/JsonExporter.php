<?php
namespace App\Services\Exporters;

use App\Services\Exporter;

class JsonExporter extends Exporter
{
    public function export($data)
    {
        return $data->toJson(JSON_PRETTY_PRINT);
    }
}
