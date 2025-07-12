<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class JsonExportController extends Controller
{
    public function exportID()
    {
        $url = 'https://machinetest.encureit.com/Kenan+Tepe.json';
        $response = Http::get($url);

        if (!$response->ok()) {
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }

        $data = $response->json();
        $ids = [];

        $extractIds = function ($item) use (&$ids, &$extractIds) {
            if (is_array($item)) {
                foreach ($item as $key => $value) {
                    if ($key === 'id') {
                        $ids[] = $value;
                    }
                    $extractIds($value);
                }
            }
        };

        $extractIds($data);

        // Count each ID's occurrences
        $idCounts = array_count_values($ids);
        
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, ['ID', 'Duplicate']);
        foreach ($ids as $id) {
            $isDuplicate = $idCounts[$id] > 1 ? 'Duplicate' : '';
            fputcsv($handle, [$id, $isDuplicate]);
        }
        rewind($handle);

        $csv = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="kenan-tepe-ids.csv"',
        ]);
    }
}
