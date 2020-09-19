<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'High Tech',
            'slug' => 'hight-tech'
            ]);
            Category::create([
                'name' => 'Livres',
                'slug' => 'livres'
                ]);
                Category::create([
                    'name' => 'Meubles',
                    'slug' => 'meubles'
                    ]);
                    Category::create([
                        'name' => 'Jeux',
                        'slug' => 'jeux'
                        ]);
                        Category::create([
                            'name' => 'Nourriture',
                            'slug' => 'nourriture'
                            ]);


    }
}
