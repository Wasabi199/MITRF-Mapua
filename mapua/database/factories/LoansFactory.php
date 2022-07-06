<?php

namespace Database\Factories;

use App\Models\Loans;
use App\Models\Contributions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loans>
 */
class LoansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $department = [
            "School of Architecture, Industrial Design, and the Built Environment",

            "School of Chemical, Biological, and Materials Engineering and Sciences",

           "School of Civil, Environmental, and Geological Engineering",

           "School of Electrical, Electronics, and Computer Engineering",

            "School of Industrial Engineering and Engineering Management",

            "School of Mechanical and Manufacturing Engineering",

            "School of Media Studies",

            "School of Social Sciences and Education",

            "Department of Arts and Letters",

            "Department of Mathematics",

           "Department of Physics",

            "School of Information Technology",

            "E.T. Yuchengo School of Business in collaboration with Arizona State University",

            "Admin office(Treasury, Registrar, Admission)",

            "Maintenance",

        ];
        $loan_type =[
            'Educational',
            'Health',
            'House',
            'Financial',
        ];
        $aproval=[
            'Approved',
            'Pending',
            'Reviewing',
        ];
        $loan_status=[
            'Ongoing',
            'Paid',
        ];
        return [
            //
            'loan_type'=>$this->faker->randomElement($loan_type),
            'loan_amount'=>$this->faker->numberBetween($min = 1000, $max = 1000000000),
            'department'=> $this->faker->randomElement($department),
            'interest'=>$this->faker->numberBetween($min = 1000, $max=1000000),
            'approval'=>$this->faker->randomElement($aproval),
            'loan_status'=>$this->faker->randomElement($loan_status),
            'attachment_path'=>'http://3.bp.blogspot.com/_R-G_62JmanY/SCAB4RHj0_I/AAAAAAAAANQ/EGLQOelOyqo/s1600/Mapua_logo.jpg',
            'total_contribution'=>$this->faker->numberBetween($min = 1000, $max=1000000),
        ];
    }
    public function configure(){
        return 
        $this->afterCreating(
            function(Loans $loans){
            $contribution = Contributions::factory()->make();
            $loans->contributions()->create($contribution->toArray());
            $loans->save();
        });
    }

}
