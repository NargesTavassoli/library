<?php namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        $usersId = User::query()->pluck('id')->toArray();
//        $randomArray = Arr::random($usersId);
        return [
            'title' => $this->faker->title(),
//            'user_id' => $randomArray,
            'author' => $this->faker->name(),
            'publisher' => $this->faker->name(),
            'year' => $this->faker->year(),
            'price' => $this->faker->numberBetween('50000', '200000'),

        ];
    }
}
