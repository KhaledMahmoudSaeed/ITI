<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookTitles = [
            "To Kill a Mockingbird",
            "1984",
            "The Great Gatsby",
            "Pride and Prejudice",
            "Moby-Dick",
            "War and Peace",
            "The Catcher in the Rye",
            "The Lord of the Rings",
            "Jane Eyre",
            "The Hobbit",
            "Fahrenheit 451",
            "Crime and Punishment",
            "Wuthering Heights",
            "Brave New World",
            "The Odyssey",
            "The Brothers Karamazov",
            "Anna Karenina",
            "Les Misérables",
            "The Picture of Dorian Gray",
            "Ulysses",
            "One Hundred Years of Solitude",
            "The Iliad",
            "Madame Bovary",
            "Great Expectations",
            "The Scarlet Letter",
            "Don Quixote",
            "The Grapes of Wrath",
            "Frankenstein",
            "Dracula",
            "A Tale of Two Cities",
            "The Count of Monte Cristo",
            "Catch-22",
            "The Metamorphosis",
            "Beloved",
            "The Divine Comedy",
            "The Road",
            "The Handmaid's Tale",
            "Invisible Man",
            "Slaughterhouse-Five",
            "Lolita",
            "The Sun Also Rises",
            "The Stranger",
            "On the Road",
            "The Sound and the Fury",
            "Heart of Darkness",
            "A Clockwork Orange",
            "Lord of the Flies",
            "The Old Man and the Sea",
            "Of Mice and Men",
            "The Kite Runner"
        ];
        Book::factory()->count(50)->create([
            'title' => function () use ($bookTitles) {
                return $bookTitles[array_rand($bookTitles)];
            },
        ]);
    }
}
