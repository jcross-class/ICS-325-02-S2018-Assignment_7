<?php

// You need to add this code to your processorder_v4.php file in order to track
// what the next order number is.

// open the file that stores the order count
// mode c+ means to open the file for reading and writing, do not truncate it,
// and if it doesn't exit, create it
$next_order_number_count_file = fopen("next_order_number.txt", "cb+");
// YOUR CODE HERE: you need to add error checking for fopen

// YOUR CODE HERE: you need to get an exclusive lock on $next_order_number_count_file
// YOUR CODE HERE: you need to add error checking for flock

// get the next order number from the file
// if the file is empty, which happens when it is created by fopen, then false will be returned
$next_order_number = fgets($next_order_number_count_file);
if ($next_order_number === false) {
    // since there is no order number, we will assume we are order 0
    $next_order_number = 0;
}
// display the order number NOTE: You should display the order number with the rest of the
// order details
echo $order_num;
// Truncate the file to 0 size.  This deletes everything in the file.
ftruncate($next_order_number_count_file, 0);
// write out the next order number to use by incrementing the one we just read in
fputs($next_order_number_count_file, ++$next_order_number);
// close the file
fclose($next_order_number_count_file);