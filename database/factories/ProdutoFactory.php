<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'preco' => $this->faker->randomFloat(2, 1, 1000),
            'descricao' => $this->faker->sentence,
            'codigo_barras' => $this->faker->unique()->regexify('[A-Za-z0-9]{12}'),
        ];
    }
}
