<?php require_once __DIR__.'/../header.php'; ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/events.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../public/assets/js/jsf.js"></script>
    

  </head>
  <style>
      h2{
    margin-left:600;
    padding-bottom: 33;
}
  </style>
  <h2>Events</h2>

          <?php
            if(isset($_SESSION['user'])){
                
                if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
                    echo "<a class='btn btn-primary' id='id0' href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php/index.php?route=events&function=updateView' role='button'>Create a new event</a>";
                }
            }
        ?>


<table id="ok1">
    <tr>
        <th id="id">ID</th>
        <th id="id2">Name</th>
        <th id="id3">Start</th>
        <th id="id4">End</th>
        <th id="id5">Number</th>
        <th id="id6">Venue</th>
        <?php
            if(isset($_SESSION['user'])){
                
                if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
                    echo "<th id='id8'>Manage</th>";
                }
            }
        ?>
    <tr>
<?php

foreach($events as $event){
    echo '<tr>';
    echo "<td id='id'>".$event->idevent."</td>";
    echo "<td id='id2'><a class='btn btn-primary' href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=single&id=$event->idevent'>".$event->name."</td>";
    echo "<td id='id3'>".$event->getStart()."</td>";
    echo "<td id='id4'>".$event->getEnd()."</td>";
    echo "<td id='id5'>".$event->numberallowed."</td>";
    echo "<td id='id6'>".$event->venue."</td>";
    echo "<td id='id7'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=index&id=$event->idevent' class='btn btn-primary'>View Sessions</a></td>";
   
    if(isset($_SESSION['user'])){
        if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
             echo "<td id='id10'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=updateView&id=$event->idevent' class='btn btn-primary'>Update</a></td>";
             echo "<td id='id11'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=delete&id=$event->idevent' class='btn btn-danger'>Delete</a></td>";
                     
        }
    }
    echo '</tr>';
}
?>
   </tr>
</table>
    <script   src="https://code.jquery.com/jquery-3.6.1.js"   integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="   crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php require_once __DIR__.'/../footer.php'; ?>