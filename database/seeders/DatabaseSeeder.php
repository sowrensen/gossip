<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User will be created along with messages
        Room::factory()
            ->count(3)
            ->hasMessages(4)
            ->create();
    }
}
