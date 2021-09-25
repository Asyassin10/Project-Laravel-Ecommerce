<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'yassin',
            'email' => 'asyassin06@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('KVBXY8FDKZ'),
            'remember_token' => Str::random(10),
        ];
    }
}