<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent = new Category();
        $parent->slug = Str::slug('Community');
        $parent->setTranslation('name', 'en', 'Community')
                ->setTranslation('name', 'fr', 'Communauté');
        $parent->save();

        $Category = new Category();
        $Category->setTranslation('name', 'en', 'Services')
            ->setTranslation('name', 'fr', 'Services');
        $Category->slug = str_slug('Services');
        $Category->save();

        $Category = new Category();
        $Category->setTranslation('name', 'en', 'Services')
            ->setTranslation('name', 'fr', 'Logement');
        $Category->slug = str_slug('Housing');
        $Category->save();

        $Category = new Category();
        $Category->setTranslation('name', 'en', 'For sale')
            ->setTranslation('name', 'fr', 'A vendre');
        $Category->slug = str_slug('For sale');
        $Category->save();

        $Category = new Category();
        $Category->setTranslation('name', 'en', 'Jobs')
            ->setTranslation('name', 'fr', 'Emploi');
        $Category->slug = str_slug('Jobs');
        $Category->save();
    }
}
