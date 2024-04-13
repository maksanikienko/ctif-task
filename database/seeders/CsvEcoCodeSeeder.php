<?php

namespace Database\Seeders;

use App\Models\EcoCode;
use Illuminate\Database\Seeder;

class CsvEcoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = storage_path('app/eco_codes.csv');

        if (($handle = fopen($file, 'r')) !== false) {
            $batchSize = 1000;

            $headers = fgetcsv($handle);
            $chunks = collect([]);

            while (($data = fgetcsv($handle)) !== false) {
                $chunks->push(array_combine($headers, $data));

                if ($chunks->count() >= $batchSize) {
                    EcoCode::insert($chunks->toArray());
                    $chunks = collect([]);
                }
            }
            if ($chunks->isNotEmpty()) {
                EcoCode::insert($chunks->toArray());
            }
            fclose($handle);
        }
        echo 'SUCCESS';
    }
}
