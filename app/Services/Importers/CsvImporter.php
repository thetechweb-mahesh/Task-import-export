<?php

namespace App\Services\Importers;

use App\Services\Importer;

class CsvImporter extends Importer
{
    public function import($file)
    {
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $data = [];
        foreach($rows as $row){
            $data[] = array_combine($header, $row);
        }
        return $data;
    }
}
