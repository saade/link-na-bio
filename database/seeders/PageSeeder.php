<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Page::factory()
            ->count(1)
            ->has(
                \App\Models\Link::factory()
                    ->count($count = rand(3, 7))
                    ->sequence(
                        ...array_map(
                            fn (int $index) => ['sort' => $index],
                            range(0, $count - 1)
                        )
                    )
            )
            ->create();
    }
}
