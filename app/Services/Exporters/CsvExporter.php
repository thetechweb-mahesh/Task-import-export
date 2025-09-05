<?php
namespace App\Services\Exporters;

use App\Services\Exporter;

class CsvExporter extends Exporter
{
    public function export($data)
    {
        $output = '';
        if($data->count() > 0){
            $headers = array_keys($data->first()->toArray());
            $output .= implode(',', $headers) . "\n";
            foreach($data as $row){
                $output .= implode(',', $row->toArray()) . "\n";
            }
        }
        return $output;
    }
}
