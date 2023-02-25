<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaidWey;

class PaidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paids = ['دافع', 'غير دافع'];
        foreach ($paids as $paid) {
            PaidWey::create([
                'paid' => $paid,
             
            ]);
        }
    }
}
