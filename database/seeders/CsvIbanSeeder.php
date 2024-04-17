<?php

namespace Database\Seeders;

use App\Models\Iban;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CsvIbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = storage_path('iban_2024.csv');

        if (($handle = fopen($file, 'r')) !== false) {
            $batchSize = 1000;

            $headers = fgetcsv($handle);
            $chunks = collect([]);

            while (($data = fgetcsv($handle)) !== false) {
                $chunks->push(array_combine($headers, $data));

                if ($chunks->count() >= $batchSize) {
                    Iban::insert($chunks->toArray());
                    $chunks = collect([]);
                }
            }
            if ($chunks->isNotEmpty()) {
                Iban::insert($chunks->toArray());
            }
            fclose($handle);
        }
        echo 'SUCCESS';
    }
}
