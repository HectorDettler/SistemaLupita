<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_producto'=>$this->faker->unique()->ean13(),
            'nombre_producto'=>$this->faker->word(),
            'descripcion_producto'=>$this->faker->sentence(),
            'imagen_producto'=>$this->faker->imageUrl(640,400,'products',true),
            'stock_producto'=>$this->faker->numberBetween(10,100),
            'stock_min_producto'=>$this->faker->numberBetween(5,10),
            'stock_max_producto'=>$this->faker->numberBetween(50,200),
            'precio_oferta_producto'=>$this->faker->randomFloat(2,10,500),
            'precio_venta_producto'=>$this->faker->randomFloat(2,20,600),
            'fecha_vencimiento_producto'=>$this->faker->date(),
            'id_categoria'=>28,
            'id_marca'=>13,

        ];
    }
}
