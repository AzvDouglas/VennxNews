<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Noticia;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuarios = User::pluck('id');

        return [
            'titulo' => $this->faker->sentence(),
            'descricao' => $this->faker->paragraph(),
            'imagem' => $this->faker->imageUrl(400, 300),
            'user_id' => $usuarios->random()
        ];
    }
}
