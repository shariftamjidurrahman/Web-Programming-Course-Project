<?php 
    include 'index.php';
    // Working on point 2
    if(isset($_POST['save'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $student_id = $_POST['student_id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql ="INSERT INTO `students`(`firstname`, 
        `lastname`, `student_id`, `email`, 
        `password`) 
        VALUES ('{$first_name}',
        '{$last_name}','{$student_id}',
        '{$email}','{$password}')";
        if($conn->query($sql) === TRUE){
            echo 'new user created successfully';
        } else {
            echo "ERROR: " . $conn->error;
        }
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="Background&Alignment.css">
    </head>
    <header class="header"><h1>UCAM</h1></header>
	<body class="background">
        <div style='padding-top:30px;margin:30px;width:40%'>
            <h1>Sign Up</h1>
            <form action='sign_up.php' onsubmit="return validate()" method='post' >
                <div>
                    First Name: 
                    <span style='margin-left: 20px;'>
                    <input type='text' id="first_name" name='first_name' placeholder='First Name' required></span>
                </div><br> 
                <div>
                    Last Name: 
                    <span style='margin-left: 20px'>
                    <input type='text' id='last_name' name='last_name' placeholder='Last Name' required></span>
                </div><br>
                <div>
                    Student: 
                    <span style='margin-left: 20px'>
                    <input type='text' id='student_id' name='student_id' placeholder='Student Id' required></span>
                </div><br>
                <div>
                    Email: 
                    <span style='margin-left: 20px'>
                    <input type='text' id='email' name='email' placeholder='Email' required></span>
                </div><br>
                <div>
                    Password: 
                    <span style='margin-left: 20px'>
                    <input type='text' id='password' name='password' placeholder='Password' required></span>
                </div><br>
                <div>
                    <input class="button button4" type='submit' value='Sign up user' name='save'>
                </div>    
            </form>
        </div>
        <script src="ClientSideValidation.js"></script>
    </body>
    
</html>