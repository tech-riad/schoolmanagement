<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'event_date'  => '13/06/2022',
            'title'=> 'London Campus Visit - Postgraduate',
            'description'   => 'description',
            'image'  => 'event.png',
            'slug' => 'event',
            'status' => '1',
           ]);
        Event::create([
            'event_date'  => '13/06/2022',
            'title'=> 'Technology',
            'description'   => 'High Time for Cyberlaw Enforcement and a Future of Work Strategy',
            'image'  => 'gal.png',
            'slug' => 'technology',
            'status' => '1',
           ]);
    }
}
