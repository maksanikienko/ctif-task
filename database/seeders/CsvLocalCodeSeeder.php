<?php

namespace Database\Seeders;

use App\Models\LocalCode;
use Illuminate\Database\Seeder;

class CsvLocalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = storage_path('app/locality.csv');

        if (($handle = fopen($file, 'r')) !== false) {
            $batchSize = 1000;

            $headers = fgetcsv($handle);
            $chunks = collect([]);

            while (($data = fgetcsv($handle)) !== false) {
                $chunks->push(array_combine($headers, $data));

                if ($chunks->count() >= $batchSize) {
                    LocalCode::insert($chunks->toArray());
                    $chunks = collect([]);
                }
            }
            if ($chunks->isNotEmpty()) {
                LocalCode::insert($chunks->toArray());
            }
            fclose($handle);
        }
        echo 'SUCCESS';
    }
}
