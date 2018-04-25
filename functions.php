<?php
// Query all Students
function getAllStudents($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>" . $row["studentID"] . "</td>
                <td>" . $row["firstName"] . "</td>
                <td>" . $row["lastName"] . "</td>
                <td>" . $row["GPA"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phoneNumber"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
}

function getAllInstructors($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>" . $row["instructorID"] . "</td>
                <td>" . $row["firstName"] . "</td>
                <td>" . $row["lastName"] . "</td>
                <td>" . $row["deptName"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phoneNumber"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
}

// Query all Courses
function getAllCourses($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>" . $row["courseCode"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["deptName"] . "</td>
                <td>" . $row["instructorName"] . "</td>
                <td>" . $row["location"] . "</td>
                <td>" . $row["semester"] . "</td>
                <td>" . $row["year"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
}

// Query all departments
function getAllDepartments($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>" . $row["departmentID"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phoneNumber"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
}

function listDepartmentOptions($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option id='" . $row['departmentID'] . "'>" . $row['name'] . "</option>";
        }
    } else {
        echo "0 results";
    }
}
?>
