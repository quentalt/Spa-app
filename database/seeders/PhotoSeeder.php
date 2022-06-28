<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;
use Faker\Generator as Faker;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $photo = new Photo();
            $photo->path = $faker->imageUrl();
            $photo->description = $faker->paragraphs(2, true);
            $photo->save();
        }
}

}
