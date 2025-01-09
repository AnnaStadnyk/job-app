<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Jobs\Job;
use App\Models\User;
use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(JobDictionariesSeed::class);

        $type = Type::all();
        $location = Location::all();
        $currency = Currency::all();
        $payment = Payment::all();

        $tag = Tag::factory(3)->create();

        // User::factory(10)->create();

        User::factory()
            ->has(Employer::factory())
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        Job::factory(2)->recycle([Employer::first(), $type, $location, $currency, $payment])->hasAttached($tag)->create();


        $employers = Employer::factory(5)->create();

        Job::factory(10)->recycle([$employers, $type, $location, $currency, $payment])->hasAttached($tag)->create();

        // Employer::factory(5)->has(Job::factory(2)->recycle([$type, $location, $currency, $pay])->hasAttached($tag))->create();
        User::factory()->unverified()->create();
    }
}
