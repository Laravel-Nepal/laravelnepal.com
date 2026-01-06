<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()
            ->firstOrCreate([
                'email' => 'achyutkneupane@gmail.com',
                'role' => UserRole::Admin,
            ], [
                'name' => 'Achyut Neupane',
                'password' => bcrypt('Achyut@123'),
            ]);

        $this->call(PageSeeder::class);
    }
}
