<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class PropertyController extends Controller
{
    public function index()
{
    try {
        $factory = new \Kreait\Firebase\Factory();
        
        // 1. Get the JSON string from Vercel Environment Variables
        $jsonString = env('FIREBASE_CREDENTIALS_JSON');

        if ($jsonString) {
            // We are on Vercel: Use the string
            $credentials = json_decode($jsonString, true);
            $factory = $factory->withServiceAccount($credentials);
        } else {
            // We are on Local: Use the physical file
            $path = base_path('storage/app/firebase_key.json');
            $factory = $factory->withServiceAccount($path)
                               ->withHttpClientOptions(['verify' => false]);
        }

        // 2. Set the Database URL
        $factory = $factory->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        // 3. IMPORTANT: Create the database instance FROM THE FACTORY we just built
        $database = $factory->createDatabase();
        
        $data = $database->getReference('properties')->getValue();

        if ($data === null) return response()->json([]);

        // 4. Format for Vue
        $properties = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value['id'] = $key;
                $properties[] = $value;
            }
        }

        return response()->json($properties);

    } catch (\Throwable $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => 'Check if FIREBASE_CREDENTIALS_JSON is valid in Vercel settings.'
        ], 500);
    }
}
}