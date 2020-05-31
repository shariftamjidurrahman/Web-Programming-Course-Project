<?php
    session_start();
    session_destroy();
    // Redirecting to different page
    header('Location: http://localhost/Web/home.html');
?>