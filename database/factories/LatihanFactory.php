<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Latihan>
 */
class LatihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' =>$this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'deskripsi'=> $this->faker->sentence(mt_rand(10,25)),
            'soal' => collect($this->faker->paragraphs(mt_rand(5,20)))
                    -> map(fn($p) => "<p>$p</p>")
                    -> implode(''),
            'user_id' => mt_rand(1,3),
            'jenislatihan_id' => mt_rand(1,2)
        ];
    }
}
