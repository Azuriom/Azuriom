<?php

namespace Database\Factories;

use Azuriom\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Azuriom\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'color' => $this->faker->hexColor(),
        ];
    }

    /**
     * Indicate that the role is admin.
     *
     * @return static
     */
    public function admin()
    {
        return $this->state([
            'is_admin' => true,
        ]);
    }
}
