<?php

namespace App\Models\Jobs;

use App\Models\Employer;
use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\Jobs\JobFactory> */
    use HasFactory;

    protected $fillable = ['title', 'type_id', 'location_id', 'salary', 'currency_id', 'payment_id', 'description', 'requirements', 'duties'];

    public function tag(String $title): void
    {
        $tag = Tag::firstOrCreate(['title' => strtolower(trim($title))]);

        $this->tags()->attach($tag);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
