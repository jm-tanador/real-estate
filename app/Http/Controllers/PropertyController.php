<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class PropertyController extends Controller
{
    public function index()
    {
        try {
            // No more fancy bypass code needed because we fixed php.ini!
            $database = Firebase::database();
            $data = $database->getReference('properties')->getValue();

            if ($data === null) return response()->json([]);

            // Format for Vue
            if (isset($data['title'])) {
                $data['id'] = 'prop_1';
                return response()->json([$data]);
            }

            $properties = [];
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $value['id'] = $key;
                    $properties[] = $value;
                }
            }
            return response()->json($properties);

        } catch (\Throwable $e) {
            // This will now show the REAL error because SSL is fixed
            return response()->json([
                'error' => $e->getMessage(),
                'type' => get_class($e)
            ], 500);
        }
    }
}