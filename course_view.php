<?php
    include 'index.php';
	session_start();
    if(!isset($_SESSION['user_id']))
    {
		header('Location: http://localhost/Web/sign_in.php');    	
	}
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="Background&Alignment.css">

    </head>
    <header class="header"><h1>UCAM</h1></header>
	<body class="background">
    <h1>Welcome to Course View page of <?= $_SESSION['user_id'] ?></h1>
        <div>
            <span>Student Name : </span>
            <?php
                $sql = "SELECT `firstname`, `lastname` FROM 
                `students` WHERE `student_id`='{$_SESSION['user_id']}'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) 
                {        
                    echo $row['firstname']; 
                    echo $row['lastname'];         
                } 
            ?>
        </div>
        <div>
            <span>Student Name : </span>
            <?php
                $sql = "SELECT `student_id` FROM 
                `students` WHERE `student_id`='{$_SESSION['user_id']}'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) 
                {        
                    echo $row['student_id']; 
                } 
            ?>
        </div><br>
        <div class="form">
            <table border=1>
                <tr>
                    <th>Course Title</th>
                    <th>Credit</th>
                </tr>
                <?php
                    $sql = "SELECT DISTINCT courses.course_name,courses.course_credit 
                    FROM `students` JOIN `course_registration` JOIN `courses` 
                    WHERE students.student_id='{$_SESSION['user_id']}'";
                    $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) 
                        {        
                ?>
                <tr>
                    <td><?php echo $row['course_name'] ?></td>
                    <td><?php echo $row['course_credit'] ?></td>
                </tr>
                <?php } ?>
                <?php
                    $sql = "SELECT SUM(course_credit) as total_credit FROM 
                    (SELECT DISTINCT courses.course_name,courses.course_credit 
                    FROM `students` JOIN `course_registration` JOIN `courses` 
                    WHERE students.student_id='{$_SESSION['user_id']}') AS T";
                    $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) 
                        {        
                ?>
                <tr>
                    <td>Total Taken Credit</td>
                    <td><?php echo $row['total_credit'] ?></td>
                </tr>
                
                <?php } ?>
                <?php
                    $sql = "SELECT COUNT(course_credit) as total_course FROM 
                    (SELECT DISTINCT courses.course_name,courses.course_credit 
                    FROM `students` JOIN `course_registration` JOIN `courses` 
                    WHERE students.student_id='{$_SESSION['user_id']}') AS T";
                    $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) 
                        {        
                ?>
                <tr>
                    <td>Total Taken Course</td>
                    <td><?php echo $row['total_course'] ?></td>
                </tr>
                
                <?php } ?>
            </table><br>
            <button class="button button4">
            <a href="http://localhost/Web/Sign_out.php">Sign Out</a>  
            </button>
        </div>
	</body>
</html>