<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Evento;

use Illuminate\Database\Eloquent\Factories\Factory;

use Carbon\Carbon;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario' => User::inRandomOrder()->first()->id,
            'nome' => $this->faker->text(50),
            'dtinicio' => Carbon::now(),
            'dtfim' => Carbon::now(),
            'hrinicio' => $this->faker->time(),
            'hrfim' => $this->faker->time(),
            'descricao' =>  $this->faker->text(150),
            'lembrete' => rand(0,1),
        ];
    }
}
