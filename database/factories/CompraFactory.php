<?php

namespace Database\Factories;

use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition()
    {
        return [
            'data' => $this->faker->date,
            'quantidade' => $this->faker->numberBetween(1, 100),
            'fornecedor' => $this->faker->company,
        ];
    }
}
