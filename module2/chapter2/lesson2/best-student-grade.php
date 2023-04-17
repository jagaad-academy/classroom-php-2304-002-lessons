<?php

$numberStudents = (int)readline('Number: ');
$students = [];
$studentsName = [];

$i = 1;
while ($i <= $numberStudents) {
    $name = readline("Name $i: ");

    if (in_array($name, $studentsName)) {
        echo "I already have this name, please try again.\n";
        continue; // next iteration
    }

    $grade = readline("Grade $i: ");

    $students[] = [
        'name' => $name, 
        'grade' => (float)$grade,
    ];

    $studentsName[] = $name;
    $i++;
}

$bestStudent = [
    'name' => null,
    'grade' => 0,
];

foreach ($students as $student) {
    if ($student['grade'] > $bestStudent['grade']) {
        $bestStudent = $student;
    }
}

echo <<<OUTPUT
The best student is $bestStudent[name], grade: $bestStudent[grade]
OUTPUT;
