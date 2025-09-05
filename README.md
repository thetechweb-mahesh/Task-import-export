# Laravel Import/Export Task

## Features Implemented
- Abstract Exporter & Importer classes
- CSV, JSON, XML Exporters
- CSV, JSON Importers
- Exportable & Importable Traits for Eloquent Models
- Jobs for background DataExport & DataImport
- Batch export (multiple formats in one request)
- Controller + Routes (API ready)
- Background processing using Laravel Queue

## How to Run
1. Clone the repo
   ```bash
   git clone https://github.com/your-username/laravel-import-export-task.git
   cd laravel-import-export-task
   composer install
   cp .env.example .env
   php artisan key:generate
