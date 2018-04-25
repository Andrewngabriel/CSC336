<?php
include("db.php");
include("functions.php");
include("includes/header.html");
?>

<body>
    <?php include("includes/navigation.html"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2>Enroll in a Class</h2>
                <form action="#" method="post" id="Enroll">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sID" placeholder="Student ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="courseCode" placeholder="Course Code">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                    if($_POST && isset($_POST['sID'])  && isset($_POST['courseCode']) ){
                        $id=$_POST['sID'];
                        $code=$_POST['courseCode'];
                        $sql="INSERT INTO Enrollment (studentID, courseCode) VALUES ('$id', '$code')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                ?>
            </div>

            <div class="col-md-6">
                <h2>View my Courses</h2>
                <form class="form-inline" action="#" method="post" id="myCourses">
                    <div class="form-group">
                        <input type="text" class="form-control" name="ID" placeholder="Student Id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <table class="table table-bordered table-hover table-striped table-responsive">
                    <?php
                        if($_POST && isset($_POST['ID'])){
                            $studentid=$_POST['ID'];
                            $sql = "SELECT Courses.*, Enrollment.grade, Departments.name AS deptName, CONCAT (Instructors.firstName,' ', Instructors.lastName)AS instructorName
                                    FROM Enrollment
                                    JOIN Courses ON Enrollment.courseCode = Courses.courseCode
                                    JOIN Departments ON Courses.department = Departments.departmentID
                                    JOIN Instructors ON Courses.instructor = Instructors.instructorID
                                    WHERE Enrollment.studentID = '$studentid'";
                            $result = $conn->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                echo "<tr>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Instructor Name</th>
                                        <th>Department</th>
                                        <th>Semester</th>
                                        <th>Year</th>
                                        <th>Grade</th>
                                    </tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                    <tr>
                                    <td>" . $row["courseCode"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["instructorName"] . "</td>
                                    <td>" . $row["deptName"] . "</td>
                                    <td>" . $row["semester"] . "</td>
                                    <td>" . $row["year"] . "</td>
                                    <td>" . $row["grade"] . "</td>
                                    </tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
                <h2>Search Classes By Instructor</h2>

                <form class="form-inline" action="#" method="post" id="viewMyClasses">
                    <div class="form-group">
                        <input type="text" class="form-control" name="InstructorID" placeholder="Instructor Id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <table class="table table-bordered table-hover table-striped table-responsive">
                    <?php
                        if($_POST && isset($_POST['InstructorID'])){
                            $instructorID=$_POST['InstructorID'];
                            $sql = "SELECT Courses.*, Departments.name AS deptName, CONCAT (Instructors.firstName,' ', Instructors.lastName)AS instructorName
                                    FROM Courses
                                    JOIN Departments ON Courses.department = Departments.departmentID
                                    JOIN Instructors ON Courses.instructor = Instructors.instructorID
                                    WHERE instructor = '$instructorID'";
                            $result = $conn->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                echo "
                                <tr>
                                    <th>Instructor Name</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                </tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                    <tr>
                                    <td>" . $row["instructorName"] . "</td>
                                    <td>" . $row["courseCode"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["deptName"] . "</td>
                                    <td>" . $row["location"] . "</td>
                                    <td>" . $row["semester"] . "</td>
                                    <td>" . $row["year"] . "</td>
                                    </tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                        }
                    ?>
                </table>
            </div>

            <div class="col-md-6">
                <h2>Search Classes By Department</h2>

                <form class="form-inline" action="#" method="post" id="viewDeptClasses">
                    <div class="form-group">
                        <input type="text" class="form-control" name="DeptName" placeholder="Department Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <table class="table table-bordered table-hover table-striped table-responsive">
                    <?php
                        if($_POST && isset($_POST['DeptName'])){
                            $dname=$_POST['DeptName'];
                            $sql = "SELECT Courses.*, CONCAT(Instructors.firstName, ' ', Instructors.lastName) AS instructorName
                                    FROM Courses
                                    JOIN Instructors ON Courses.instructor = Instructors.instructorID
                                    JOIN Departments ON Courses.department = Departments.departmentID
                                    WHERE Departments.name = '$dname'";
                            $result = $conn->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                echo "
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Instructor Name</th>
                                    <th>Location</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                </tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                    <tr>
                                        <td>" . $row["courseCode"] . "</td>
                                        <td>" . $row["name"] . "</td>
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
                    ?>
                </table>
            </div>
        </div>

        <div class="row">
        <div class="col-md-4">
                <h2>Search Classes By Class Name</h2>

                <form class="form-inline" action="#" method="post" id="viewClassName">
                    <div class="form-group">
                        <input type="text" class="form-control" name="ClassName" placeholder="Class Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <table class="table table-bordered table-hover table-striped table-responsive">
                    <?php
                        if($_POST && isset($_POST['ClassName'])){
                            $className = $_POST['ClassName'];
                            $sql = "SELECT Courses.*, CONCAT(Instructors.firstName, ' ', Instructors.lastName) AS instructorName
                                    FROM Courses
                                    JOIN Instructors ON Courses.instructor = Instructors.instructorID
                                    WHERE Courses.name = '$className'";
                            $result = $conn->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                echo "
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Instructor Name</th>
                                    <th>Location</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                </tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                    <tr>
                                        <td>" . $row["courseCode"] . "</td>
                                        <td>" . $row["name"] . "</td>
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
                    ?>
                </table>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12">
                <h1>Courses</h1>

                <table class="table table-bordered table-hover table-striped table-responsive">
                    <tr>
                        <th>Course Code</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Instructor</th>
                        <th>Location</th>
                        <th>Semester</th>
                        <th>Year</th>
                    </tr>
                    <?php
                        $sql = "SELECT Courses.*, Departments.name AS deptName, CONCAT (Instructors.firstName,' ', Instructors.lastName)AS instructorName
                                FROM Courses
                                JOIN Departments ON Courses.department = Departments.departmentID
                                JOIN Instructors ON Courses.instructor = Instructors.instructorID";
                        $result = $conn->query($sql);
                        getAllCourses($result);
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
