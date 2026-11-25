<?php
$students=array("Alice","Bob","Charlie","David","Eve");
echo"<h2>Original Array:</h2>";
print_r($students);
asort($students);
echo"<h2>Array sorted in ascending order(assort):</h2>";
print_r($students);
arsort($students);
echo"<h2>Array sorted in Descending order(arsort):</h2>";
print_r($students);
?>

