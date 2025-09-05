<?php
namespace App\Services\Importers;

use App\Services\Importer;

class JsonImporter extends Importer
{
    public function import($file)
    {
        $json = file_get_contents($file);
        return json_decode($json, true);
    }
}
