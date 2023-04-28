<?php
// Prompt the user to enter their grade
$grade = readline("Enter your grade (out of 100): ");

// Determine the letter grade and percentage score based on the grading scale
if ($grade >= 90) {
    $letterGrade = "A";
    $percentageScore = 4.0;
} elseif ($grade >= 80) {
    $letterGrade = "B";
    $percentageScore = 3.0;
} elseif ($grade >= 70) {
    $letterGrade = "C";
    $percentageScore = 2.0;
} elseif ($grade >= 60) {
    $letterGrade = "D";
    $percentageScore = 1.0;
} else {
    $letterGrade = "F";
    $percentageScore = 0.0;
}

// Calculate the user's percentage score
$totalPoints = 4.0 * 3; // Assuming 3 credits for the course
$earnedPoints = $percentageScore * 3;
$percentage = ($earnedPoints / $totalPoints) * 100;

// Output a message that includes the user's grade and percentage score
echo "Your grade of " . $grade . " corresponds to a letter grade of " . $letterGrade . " and a percentage score of " . $percentage . "%";
