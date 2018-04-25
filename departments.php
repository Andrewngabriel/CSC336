<?php
include("db.php");
include("functions.php");
include("includes/header.html");
?>

<body>
    <?php include("includes/navigation.html"); ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <h2>Departments</h2>

            <table class="table table-bordered table-hover table-striped table-responsive">
                <tr>
                    <th>Department Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM Departments";
                    $result = $conn->query($sql);
                    getAllDepartments($result);
                ?>
            </table>
        </div>

        <div class="row">
            <!-- MatthewJ: This creates input boxes and a button to create a department -->
            <div class="col-md-7">
                <h2>Create a Department</h2>

                <form action="#" method="post" id="createDepartment">
                    <div class="form-group">
                        <input type="text" class="form-control" name="DeptName" placeholder="Department Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="DeptEmail" placeholder="Department Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="DeptNumber" placeholder="Department Phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <?php
                    if($_POST && isset($_POST['DeptName'])  && isset($_POST['DeptEmail']) && isset($_POST['DeptNumber'])){
                        $dname=$_POST['DeptName'];
                        $email=$_POST['DeptEmail'];
                        $number=$_POST['DeptNumber'];
                        $sql="INSERT INTO Departments (name, email, phoneNumber) VALUES ('$dname', '$email', '$number')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                ?>
            </div>

            <!-- MatthewJ: This creates input boxes and a button to create an instructor -->
            <div class="col-md-7">
                <h2>Create an Instructor</h2>

                <form action="#" method="post" id="createInstructor">
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputFirstName" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputLastName" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputNumber" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputDepartment" placeholder="Department Id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                    if($_POST && isset($_POST['InputFirstName']) && isset($_POST['InputLastName']) && isset($_POST['InputEmail']) && isset($_POST['InputNumber']) && isset($_POST['InputDepartment'])){
                        $fname=$_POST['InputFirstName'];
                        $lname=$_POST['InputLastName'];
                        $email=$_POST['InputEmail'];
                        $number=$_POST['InputNumber'];
                        $departmentID=$_POST['InputDepartment'];
                        $sql="INSERT INTO Instructors (firstName, lastName, department, email, phoneNumber) VALUES ('$fname', '$lname', '$departmentID', '$email', '$number')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                ?>
            </div>

            <!-- MatthewJ: This creates input boxes and a button to create a course -->
            <div class="col-md-7">
                <h2>Create a Course</h2>

                <form action="#" method="post" id="createCourse">
                    <div class="form-group">
                        <input type="text" class="form-control" name="CourseName" placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="CourseInstructor" placeholder="Instructor Id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="CourseLocation" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="CourseDept" placeholder="Department Id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                    if($_POST && isset($_POST['CourseName'])  && isset($_POST['CourseInstructor']) && isset($_POST['CourseLocation']) && isset($_POST['CourseDept'])){
                        $cname=$_POST['CourseName'];
                        $cinstructor=$_POST['CourseInstructor'];
                        $clocation=$_POST['CourseLocation'];
                        if($clocation == "") $clocation = "TBD";
                        $cdepartment=$_POST['CourseDept'];
                        $sql="INSERT INTO Courses (name, department, instructor, location) VALUES ('$cname', '$cdepartment', '$cinstructor', '$clocation')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                ?>
            </div>

            <div class="col-md-7">
                <h2>Create a Student</h2>

                <form action="#" method="post" id="createStudent">
                    <div class="form-group">
                        <input type="text" class="form-control" name="StudentFirst" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="StudentLast" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="StudentEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="StudentNumber" placeholder="Phone Number">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                    if($_POST && isset($_POST['StudentFirst'])  && isset($_POST['StudentLast']) && isset($_POST['StudentEmail']) && isset($_POST['StudentNumber'])){
                        $studentFName=$_POST['StudentFirst'];
                        $studentLName=$_POST['StudentLast'];
                        $studentEmail=$_POST['StudentEmail'];
                        $studentNumber=$_POST['StudentNumber'];
                        $sql="INSERT INTO Students (firstName, lastName, email, phoneNumber) VALUES ('$studentFName', '$studentLName', '$studentEmail', '$studentNumber')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                ?>
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
