<?php
include("db.php");
include("functions.php");
include("includes/header.html");
?>

<body>
    <?php include("includes/navigation.html"); ?>
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Course Code">
                <select class="form-control">
                    <?php
                        $sql = "SELECT name FROM Departments";
                        $result = $conn->query($sql);
                        listDepartmentOptions($result);
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
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