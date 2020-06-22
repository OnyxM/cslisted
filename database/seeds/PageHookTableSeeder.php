<?php

use App\PageHook;
use Illuminate\Database\Seeder;

class PageHookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagehooks = [
            "PAGE_HOOK_HEADER",
            "PAGE_HOOK_NAV",
            "PAGE_HOOK_FOOTER"
        ];

        foreach ($pagehooks as $pagehook)
        {
            PageHook::create(["label"=>$pagehook]);
        }
    }
}
