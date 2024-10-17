<?php
$myyear = 2005;

$list1 = array(2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2008, 2010);

foreach ($list1 as $x) {
    echo "$x <br>"; // Output each year

    if ($x == $myyear) { // Check if current year matches $myyear
        echo "found<br>";
    }
}
?>
