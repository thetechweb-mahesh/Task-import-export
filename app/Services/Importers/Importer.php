<?php

namespace App\Services;

abstract class Importer
{
    abstract public function import($file);
}
