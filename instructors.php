<?php
include("db.php");
include("functions.php");
include("includes/header.html");
?>

<body>
    <?php include("includes/navigation.html"); ?>
    <div class="container-fluid">
        <div class="col-md-4">
            <h2>View Students in Course</h2>
            <form class="form-inline" action="#" method="post" id="myCourses">
                <div class="form-group">
                    <input type="text" class="form-control" name="coursecode" placeholder="Course code">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <table class="table table-bordered table-hover table-striped table-responsive">
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                <?php
                    if($_POST && isset($_POST['coursecode'])){
                        $code=$_POST['coursecode'];
                        $sql = "SELECT Students.*, CONCAT(Students.firstName, ' ', Students.lastName) AS name
                                FROM Enrollment
                                JOIN Students ON Enrollment.studentID = Students.studentID
                                WHERE Enrollment.courseCode = '$code'";
                        $result = $conn->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["phoneNumber"] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                    }
                ?>
            </table>
        </div>

        <div class="col-md-4">
            <h1>Assign Grade</h1>
            <form action="#" method="post" id="assignGrade">
                <div class="form-group">
                    <input type="text" class="form-control" name="studentId" placeholder="Student ID">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="classCode" placeholder="Course code">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="gradeGiven" placeholder="Grade">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <?php
                if($_POST && isset($_POST['studentId'])  && isset($_POST['classCode']) && isset($_POST['gradeGiven'])){
                    $id=$_POST['studentId'];
                    $code=$_POST['classCode'];
                    $grade=$_POST['gradeGiven'];
                    $num = 1.0;
                    $sql="UPDATE Enrollment SET grade = '$grade' WHERE studentID = '$id' AND courseCode = '$code'";
                    if ($conn->query($sql) === TRUE) {
                        if($grade == 'A-') $num = 3.67;
                        else if($grade == 'B+') $num = 3.33;
                        else if($grade == 'B') $num = 3.0;
                        else if($grade == 'B-') $num = 2.67;
                        else if($grade == 'C+') $num = 2.33;
                        else if($grade == 'C') $num = 2.0;
                        else if($grade == 'C-') $num = 1.67;
                        else if($grade == 'D+') $num = 1.33;
                        else if($grade == 'D') $num = 1.0;
                        else if($grade == 'D-') $num = 0.67;
                        else if($grade == 'F') $num = 0;
                        else $num = 4.0;
                        $result = $conn->query("SELECT * FROM Enrollment WHERE studentID = '$id' AND grade IS NOT NULL");
                        $n = mysqli_num_rows($result);
                        if($n - 1 > 0){
                            $studentInfo = $conn->query("SELECT * FROM Students WHERE studentID = '$id'");
                            $row=$studentInfo->fetch_assoc();
                            $oldGPA = floatval($row['GPA']);
                            $newGPA = $oldGPA + (($num - $oldGPA) / $n);
                            $sql="UPDATE Students SET GPA = '$newGPA' WHERE studentID = '$id'";
                        }
                        else{
                            $sql="UPDATE Students SET GPA = '$num' WHERE studentID = '$id'";
                        }
                        if ($conn->query($sql) === TRUE) {
                            echo "Successfully updated student";
                        }
                        else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Instructors</h2>

                <table class="table table-bordered table-hover table-striped table-responsive">
                    <tr>
                        <th>Instructor Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                    </tr>
                    <?php
                        $sql = "SELECT Instructors.*, Departments.name AS deptName
                                FROM Instructors
                                JOIN Departments ON Instructors.department = Departments.departmentID";
                        $result = $conn->query($sql);
                        getAllInstructors($result);
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>

<?php
    // Close connection with database
    $conn->close();
?>
</html>
