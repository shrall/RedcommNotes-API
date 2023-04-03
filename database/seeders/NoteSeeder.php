<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 0; $x <= 10; $x++) {
            $note = new Note();
            $note->title = "Title $x";
            $note->content = "Content $x";
            $note->save();
        }
    }
}
