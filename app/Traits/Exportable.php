<?php
namespace App\Traits;

use App\Services\Exporters\CsvExporter;
use App\Services\Exporters\JsonExporter;
use App\Services\Exporters\XmlExporter;

trait Exportable
{
    public static function export($format)
    {
        $data = self::all();

        $exporter = match($format) {
            'csv' => new CsvExporter(),
            'json' => new JsonExporter(),
            'xml' => new XmlExporter(),
            default => new JsonExporter(),
        };

        return $exporter->export($data);
    }

    public static function batchExport(array $formats)
    {
        $results = [];
        foreach($formats as $format){
            $results[$format] = self::export($format);
        }
        return $results;
    }
}
