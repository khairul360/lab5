<!DOCTYPE html>
<html>
<head>
    <title>My Details</title>
</head>
<body>
    <?php

    $name = "khairul amin";
    $matric_number = "DI220062";
    $course = "FSKTM";
    $year_of_study = "3nd Year";
    $address = "TDI, UTHM";

    echo "<table>
            <tr>
                <th>Detail</th>
                <th>Information</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>$name</td>
            </tr>
            <tr>
                <td>Matric Number</td>
                <td>$matric_number</td>
            </tr>
            <tr>
                <td>Course</td>
                <td>$course</td>
            </tr>
            <tr>
                <td>Year of Study</td>
                <td>$year_of_study</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>$address</td>
            </tr>
          </table>";
    ?>
</body>
</html>
