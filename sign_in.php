<?php 
    include 'index.php';
    // Working on point 2
    session_start();

    if(isset($_POST['save'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `students` WHERE email='{$email}' AND password='{$password}'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            // User is validated
            $authenticated_user = $result->fetch_assoc();

            // Assigning Sesssion Values
            $_SESSION['user_id'] = $authenticated_user['student_id'];
            $_SESSION['name'] = "{$authenticated_user['first_name']} 
            {$authenticated_user['last_name']}";

            // Redirecting to different page
            header('Location: http://localhost/Web/course_view.php');
        }
        else 
        {
            // User not validated
            echo 'Email/password is wrong';
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
        <h1>Sign In</h1>
        <form action='sign_in.php' onsubmit="return validate()" method='post' >
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
                    <input class="button button4" type='submit' value='Sign in user' name='save'>
                </div>    
            </form>
        </div>    
    </body>
    <script src="ClientSideValidation.js"></script>
</html>