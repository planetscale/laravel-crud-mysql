<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entry;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(MoodSeeder::class);

    // create an array of random unique dates in the format y-m-d
    $randomDates = [];
    while (count($randomDates) < 15) {
      $date = Carbon::today()->subDays(rand(0, 31))->format('Y-m-d');
      if (!in_array($date, $randomDates))
        array_push($randomDates, $date);
    }

    foreach($randomDates as $date) {
      Entry::factory()->create([
        'date' => $date
      ]);
    }
  }
}