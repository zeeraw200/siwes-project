<?php
include 'database.php';

$query = "SELECT * from `requests`";
$result = mysqli_query($conn, $query);
$requests = mysqli_fetch_all($result, 1);

function calculatePending($item)
{
	return $item['status'] === 'pending';
}
function calculateTreated($item)
{
	return $item['status'] === 'treated';
}
function calculateRejected($item)
{
	return $item['status'] === 'rejected';
}


?>