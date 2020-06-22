<?php

use Illuminate\Database\Seeder;
use App\PostType;
class PostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_type = new PostType();
        $post_type->name = 'Product';
        $post_type->slug = str_slug('Product');
        $post_type->save();

        $post_type = new PostType();
        $post_type->name = 'Service';
        $post_type->slug = str_slug('Service');
        $post_type->save();

    }
}
