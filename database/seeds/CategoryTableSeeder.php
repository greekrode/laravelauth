<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = 
        [
            [
                'name' => 'Make Up'
            ],
            [
                'name' => 'Clothing'
            ],
            [
                'name' => 'Gadgets'
            ],
            [
                'name' => 'Jewelry'
            ],
            [
                'name' => 'Accessories'
            ],
            [
                'name' => 'Food / Beverages'
            ]
        ];

        foreach ($categories as $category) {
            $newcategory = Category::where('name', '=', $category['name'])->first();
            if ($newcategory === null) {
                $newcategory = Category::create([
                    'name'          => $category['name']
                ]);
            }
        }

        $allcategories = Category::All();
        foreach ($allcategories as $category) {
            $category->save();
        }
    }

}
