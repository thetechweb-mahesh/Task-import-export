<?php
namespace App\Traits;

use App\Services\Importers\CsvImporter;
use App\Services\Importers\JsonImporter;

trait Importable
{
    public static function import($file, $format)
    {
        $importer = match($format){
            'csv' => new CsvImporter(),
            'json' => new JsonImporter(),
            default => throw new \Exception("Unsupported format: $format"),
        };

        $data = $importer->import($file);
        foreach($data as $row){
            self::create($row);
        }
    }
}
