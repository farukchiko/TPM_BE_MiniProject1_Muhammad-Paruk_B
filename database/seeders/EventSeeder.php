<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' => 'Hari Kucing Internasional',
            'date' => '2024-08-08',
            'description' => 'Hari perayaan untuk kucing peliharaan di seluruh dunia.',
            'country' => 'Global'
        ]);
        
    }
}