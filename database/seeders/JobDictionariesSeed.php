<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use Illuminate\Database\Eloquent\Factories\Sequence;

class JobDictionariesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory(2)->create(new Sequence(
            ['title' => 'full time'],
            ['title' => 'part time']
        ));
        Location::factory(3)->create(new Sequence(
            ['title' => 'office'],
            ['title' => 'remote'],
            ['title' => 'mixed']
        ));
        Currency::factory(2)->create(new Sequence(
            ['title' => 'USD', 'abbr' => 'USD'],
            ['title' => 'EUR', 'abbr' => 'EUR']
        ));
        Payment::factory(3)->create(new Sequence([
            'title' => 'per year',
            'abbr' => 'p.a.',
        ], [
            'title' => 'per month',
            'abbr' => 'p.m.',
        ], [
            'title' => 'per hour',
            'abbr' => 'p.h.',
        ]));
    }
}
