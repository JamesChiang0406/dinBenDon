<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = ["陳XX", "蔡XX", "王XX", "陳XX", "林XX", "江XX", "劉XX", "徐XX", "蕭XX", "洪XX", "鄭XX", "張XX", "官XX", "陳XX", "張XX", "方XX",];

        for ($x = 0; $x < count($students); $x++) {
            $student = new student();
            $student->name = $students[$x];
            $student->account = 'student' . ($x + 1);
            $student->password = "1234";
            $student->studentNo = "20250107" . ($x + 1);
            $student->role = 'user';
            $student->save();
        }
    }
}
