<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\DataExport;
use App\Jobs\DataImport;

class DataController extends Controller
{
    public function export(Request $request)
    {
        $formats = $request->input('formats', ['json']); // Single or multiple
        DataExport::dispatch($formats); // Background job
        return response()->json(['message' => 'Export job dispatched', 'formats' => $formats]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'format' => 'required|string'
        ]);

        $path = $request->file('file')->store('imports'); // storage/app/imports
        DataImport::dispatch($path, $request->format);

        return response()->json(['message' => 'Import job dispatched']);
    }

    // Temporary GET route for browser test
    public function exportTest($format)
    {
        return User::export($format);
    }
}
