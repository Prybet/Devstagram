<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->sentence(10),
            "image" => $this->faker->randomElement([
                "1a30e61c-bc27-472a-b380-17b9ae324c9e.jpg",
                "4a30c22a-56b1-41fd-bc6d-edc5bdc91da3.jpg",
                "7abe4588-3ae4-468c-9e6d-9647b16b6b09.jpg",
                "7ba5be53-225c-4141-822c-26001a247242.jpg",
                "96d1e1ca-ba86-4b3d-84ad-545bbcb5ac5c.jpg",
                "358de1e5-a984-4cea-939e-9b0feed1ec69.jpg",
                "5970f60e-5184-402b-88ac-17f69d83a676.jpg",
                "6947faf6-c857-43ca-b967-2e24912faa4f.jpg",
                "7804e07f-a713-4cd7-866c-c3abd7492c17.jpg",
                "51960803-17db-4487-be2f-92523a04d7ed.jpg",
                "ae18f216-c5ee-4d87-af74-a11dd9d4bf4a.jpg",
                "b588ad89-5699-4518-996d-f157556f5801.jpg",
                "b0719e37-88bf-4557-8a01-5fe2cea0f105.jpg",
                "d76e7a56-82d0-4aef-a45f-4ab2ca479d4f.jpg",
                "d806e739-51fe-4a6f-a56e-f6274b536a2c.jpg",
                "e859969c-53e8-43b7-804d-a03f746eab9d.jpg",
                "edd8566b-fb18-4e73-80e5-0bbb9d5d0daf.jpg",
                "eec3768a-5c0a-4a03-8945-8c0361de1814.jpg",
                "fcb72c92-7262-437a-a3ae-a82d82f26c58.jpg",
                "fd9ac322-41ac-40c6-8792-c3a9b8670dc7.jpg",
            ]),
            "user_id" => $this->faker->randomElement([6, 7, 8, 9, 10]),
        ];
    }
}
