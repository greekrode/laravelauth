<?php

use App\Models\Business;

use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses = [
            [
                'name' => 'Local Business',
            ],
            [
                'name' => 'Public Figure',
            ],
            [
                'name' => 'Clothing (Brand)'
            ],
            [
                'name' => 'Personal Blog'
            ],
            [
                'name' => 'Photographer'
            ],
            [
                'name' => 'Sports Team'
            ],
            [
                'name' => 'Jewelry / Watches'
            ],
            [
                'name' => 'Cause or Community'
            ],
            [
                'name' => 'Attraction / Things to Do'
            ],
            [
                'name' => 'Bank'
            ],
            [
                'name' => 'Bar'
            ],
            [
                'name' => 'Book Store'
            ]
        ];

        foreach ($businesses as $business) {
            $newbusiness = Business::where('name', '=', $business['name'])->first();
            if ($newbusiness === null) {
                $newbusiness = Business::create([
                    'name'          => $business['name']
                ]);
            }
        }

        $allbusinesses = Business::All();
        foreach ($allbusinesses as $business) {
            $business->save();
        }
    }
}
