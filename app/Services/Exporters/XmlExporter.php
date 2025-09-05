<?php

namespace App\Services\Exporters;

use App\Services\Exporter;

class XmlExporter extends Exporter
{
    public function export($data)
    {
        $xml = new \SimpleXMLElement('<root/>');
        foreach($data as $item){
            $child = $xml->addChild('item');
            foreach($item->toArray() as $key=>$value){
                $child->addChild($key, htmlspecialchars($value));
            }
        }
        return $xml->asXML();
    }
}
