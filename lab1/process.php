<?php
// Перевірка, чи були отримані дані з форми
if (!empty($_POST["first_name"]) && !empty($_POST["last_name"])) {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];

    // Перевірка на обов'язкові літери (англійські літери та пробіли)
    if (preg_match('/^[A-Za-z\s]+$/', $firstName) && preg_match('/^[A-Za-z\s]+$/', $lastName)) {
        // Вивід привітання
        echo "<h2>Hello, " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "!</h2>";
        echo "<p>Full Name: " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "</p>";
    } else {
        echo "<p>Please use only English letters and spaces in your name.</p>";
    }
} else {
    echo "<p>Please fill in all fields.</p>";
}

// Змінні та типи даних
$string = "Hello";
$integer = 20;
$float = 100.45;
$boolean = true;

echo "<p>$string</p>";
echo "<p>$integer</p>";
echo "<p>$float</p>";
echo "<p>" . ($boolean ? 'true' : 'false') . "</p>";

echo "<pre>";
var_dump($string);
var_dump($integer);
var_dump($float);
var_dump($boolean);
echo "</pre>";

// Конкатенація рядків
$firstName = "Yevhen";
$lastName = "Kravchenko";

$fullName = $firstName . " " . $lastName;
echo "<p>Full Name: $fullName</p>";

// Умовні конструкції
$number = 4;

if ($number % 2 == 0) {
    echo "<p>Number is even</p>";
} else {
    echo "<p>Number is odd</p>";
}

// Цикли
echo "<p>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "</p>";

echo "<p>";
$i = 10;
while ($i >= 1) {
    echo $i . " ";
    $i--;
}
echo "</p>";

// Масиви
$student = array(
    "first_name" => "Yevhen",
    "last_name" => "Kravchenko",
    "age" => 19,
    "major" => "Computer Science"
);

echo "<h3>Student Information:</h3>";
echo "<ul>";
foreach ($student as $key => $value) {
    echo "<li>$key: $value</li>";
}

$student["average_grade"] = 4.5;

foreach ($student as $key => $value) {
    echo "<li>$key: $value</li>";
}
echo "</ul>";
?>
