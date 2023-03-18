<?php


// Connect to the database
include_once 'config.php';

// Fetch the latest data from the database
$get_accident_data = "SELECT * FROM accident_table ORDER BY id";
$run_accident_data = mysqli_query($con, $get_accident_data);

// Build the HTML for the table rows
$rows_html = "";
$i = 0;
while ($row = mysqli_fetch_array($run_accident_data)) {
    $sl = ++$i;
    $magnitude = $row['magnitude'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $speed = $row['speed'];
    $id = $row['id'];

    $rows_html .= "<tr>
        <td style='color: white'>$sl</td>
        <td style='color: white'>$magnitude</td>
        <td style='color: white'>$latitude</td>
        <td style='color: white'>$longitude</td>
        <td style='color: white'>$speed</td>
    </tr>";
}

// Return the HTML for the table rows
echo $rows_html;
