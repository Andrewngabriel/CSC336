<?php
include("db.php");
include("functions.php");
include("includes/header.html");
?>

<body>
    <?php include("includes/navigation.html"); ?>

    <!-- <div class="container">
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
    </div>/.container -->

    <div class="container-fluid">
        <!-- Students Table -->
        <div class="row">
            <div class="col-md-6" id="students">
                <h1>Students</h1>
                <table class="table table-bordered table-hover table-striped table-responsive">
                    <tr>
                        <th>Student Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>GPA</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM Students";
                        $result = $conn->query($sql);
                        getAllStudents($result);
                    ?>
                </table>
            </div>

            <!-- Instructors Table -->
            <div class="col-md-6" id="students">
                <h1>Instructors</h1>
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
                        $sql = "SELECT * FROM Instructors";
                        $result = $conn->query($sql);
                        getAllInstructors($result);
                    ?>
                </table>
            </div>
        </div>

        <div class="row">
            <!-- Courses Table -->
            <div class="col-md-6" id="students">
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

            <!-- Departments Table -->
            <div class="col-md-6" id="students">
                <h1>Departments</h1>
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
