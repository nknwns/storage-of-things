<?php

use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usings', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Thing::class)->constrained('things')->cascadeOnDelete();
            $table->foreignIdFor(Place::class)->constrained('places')->cascadeOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained('users')->nullOnDelete();

            $table->integer('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usings');
    }
};
