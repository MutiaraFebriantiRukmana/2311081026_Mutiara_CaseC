<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\camping>
 */
class campingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
        {
            return [
                'nama_penyewa' => $this->faker->name(),
                'nama_alat' => $this->faker->randomElement(['Tenda', 'Matras', 'Sleeping Bag', 'Kompor Portable', 'Carrier', 'Flysheet']),
                'tanggal_sewa' => $this->faker->date(),
                'tanggal_kembali' => $this->faker->date(),
                'jumlah_unit' => $this->faker->numberBetween(1, 5),
                'harga_per_hari' => $this->faker->numberBetween(50000, 150000),
                'status' => $this->faker->randomElement(['dipinjam', 'dikembalikan', 'terlambat']),
            ];
        }

}
