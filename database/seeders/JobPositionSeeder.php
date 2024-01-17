<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create(['current_position_bank_account' => 'Manager']);
        Position::create(['current_position_bank_account' => 'Supervisor']);
        Position::create(['current_position_bank_account' => 'Staff']);
    }
}
