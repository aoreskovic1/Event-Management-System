<?php

function active($page, $func) {
    if ($page == $_GET['route'] && $func == $_GET['function']) {
        //echo "class='active'";
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=venues&function=index" role="button" class="btn btn-primary">Venues</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=index" role="button" class="btn btn-primary">Events</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=registration&function=index" role="button" class="btn btn-primary">Registrations</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
                if (in_array($_SESSION['user']->role, [ADMIN, MNGR])) {
                    echo "<li class='nav-item' role='presentation'> <a class='btn btn-primary' href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=createSessionView'>Create Session</a></li>";
                    echo "<li class='nav-item' role='presentation'> <a class='btn btn-primary' href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=user&function=index'>Users</a></li>";
                }
                echo "<li style='float:right' class='logout-btn'>"
                    . "<form method='POST' action='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=auth&function=logout'>"
                    . "<button class='btn btn-primary id='d'>Logout</button></form></li>";
                if (isset($_SESSION['user'])) {
                echo "<li id='k2'><a>Welcome " . $_SESSION['user']->name . "</a></li>";
                
            }
            }?>
        </ul>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>