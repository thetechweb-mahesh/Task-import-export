<?php
namespace App\Services;

abstract class Exporter
{
    abstract public function export($data);
}
