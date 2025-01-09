<?php

use App\Models\Employer;
use App\Models\Jobs\Distionaries\Currency;
use App\Models\Jobs\Distionaries\Location;
use App\Models\Jobs\Distionaries\Payment;
use App\Models\Jobs\Distionaries\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 50);
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 50);
            $table->timestamps();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 20);
            $table->string('abbr', length: 10);
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 50);
            $table->string('abbr', length: 10);
            $table->timestamps();
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employer::class)->constrained()->onDelete('cascade');
            $table->string('title', length: 250);
            $table->foreignIdFor(Type::class)->nullable()->constrained()->onDelete('set null')->default(1);
            $table->foreignIdFor(Location::class)->nullable()->constrained()->onDelete('set null')->default(1);
            $table->float('salary');
            $table->foreignIdFor(Currency::class)->nullable()->constrained()->onDelete('set null')->default(1);
            $table->foreignIdFor(Payment::class)->nullable()->constrained()->onDelete('set null')->default(1);
            $table->longText('description');
            $table->longText('requirements');
            $table->longText('duties');
            $table->boolean('featured')->default(false);
            $table->boolean('closed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('jobs');
    }
};
