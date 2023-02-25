<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statu;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['wetting', ' approved'];
        foreach ($status as $statu) {
            statu::create([
                'name' => $statu,
             
            ]);
        }
    }
}
