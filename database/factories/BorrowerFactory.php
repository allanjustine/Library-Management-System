<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $courseYearOptions = [
            'BSIT, 1st YEAR',
            'BSIT, 2nd YEAR',
            'BSIT, 3rd YEAR',
            'BSIT, 4th YEAR',
            'BSN, 1st YEAR',
            'BSN, 2nd YEAR',
            'BSN, 3rd YEAR',
            'BSN, 4th YEAR',
            'BSBM, 1st YEAR',
            'BSBM, 2nd YEAR',
            'BSBM, 3rd YEAR',
            'BSBM, 4th YEAR',
            'BSCRIM, 1st YEAR',
            'BSCRIM, 2nd YEAR',
            'BSCRIM, 3rd YEAR',
            'BSCRIM, 4th YEAR',
            'BSHM, 1st YEAR',
            'BSHM, 2nd YEAR',
            'BSHM, 3rd YEAR',
            'BSHM, 4th YEAR',
            'BSED, 1st YEAR',
            'BSED, 2nd YEAR',
            'BSED, 3rd YEAR',
            'BSED, 4th YEAR',
            'BSA, 1st YEAR',
            'BSA, 2nd YEAR',
            'BSA, 3rd YEAR',
            'BSA, 4th YEAR',
        ];
        $returnDate = fake()->dateTimeBetween('+1 week', '+4 weeks')->format('Y-m-d');
        return [
            'borrower_id_num' => fake()->unique()->numberBetween(100, 5000),
            'borrower_lname' => $this->faker->lastName,
            'borrower_fname' => $this->faker->firstName,
            'borrower_phone' => $this->faker->phoneNumber,
            'borrower_email' => $this->faker->unique()->safeEmail,
            'borrower_course_and_year' => fake()->randomElement($courseYearOptions),
            'return_date'    => $returnDate,
            'library_book_id' => fake()->numberBetween(1, 15)
        ];
    }
}
