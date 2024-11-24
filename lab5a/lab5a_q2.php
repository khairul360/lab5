<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <?php
    $students = [
        [
            'name' => 'Alice',
            'program' => 'BIP',
            'age' => 21
        ],
        [
            'name' => 'Bob',
            'program' => 'BIS',
            'age' => 20
        ],
        [
            'name' => 'Raju',
            'program' => 'BIT',
            'age' => 22
        ]
    ];

    echo "<table>
            <tr>
                <th>Name</th>
                <th>Program</th>
                <th>Age</th>
            </tr>";

    // Use foreach to loop through the $students array
    foreach ($students as $student) {
        echo "<tr>
                <td>{$student['name']}</td>
                <td>{$student['program']}</td>
                <td>{$student['age']}</td>
              </tr>";
    }

    // End the table
    echo "</table>";
    ?>
</body>
</html>
