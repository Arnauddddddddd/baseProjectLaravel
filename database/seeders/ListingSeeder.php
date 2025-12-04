<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->admin()->create();
        $users = User::factory(10)->create();

        Listing::factory(10)->create([
            'user_id' => $admin->id,
        ]);

        foreach ($users as $user) {
            Listing::factory(5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
