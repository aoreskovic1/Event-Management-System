<?php require_once __DIR__.'/../header.php'; ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/session.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../public/assets/js/jsf.js"></script>

  </head>
  <style>
      #id2{
    padding-left: 90;
}
  </style>

<h1 id="id1">Sessions for <?php echo $event->name; ?></h1>

<table>
    <tr>
        <th id="id2">ID</th>
        <th id="id3">Name</th>
        <th id="id4">Start</th>
        <th id="id5">End</th>
        <th id="id6">Number </th>
        <?php
            if(isset($_SESSION['user'])){
                
                if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
                    echo "<th id='id99'>Update</th>";
                }
            }
        ?>
    <tr>
<?php

foreach($sessions as $session){
    echo '<tr>';
    echo "<td id='id2'>".$session->idsession."</td>";
    echo "<td id='id3'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=single&id=$session->idsession' class='btn btn-primary'>".$session->name."</td>";
    echo "<td id='id4'>".$session->startdate."</td>";
    echo "<td id='id5'>".$session->enddate."</td>";
    echo "<td id='id6'>".$session->numberallowed."</td>";
    
    if(in_array($session->idsession, $userSessions)) {
        echo "<td id='id10'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=registration&function=delete&session=$session->idsession&attendee=$user' class='btn btn-danger'>Unregister</a></td>";
    }
    else echo "<td id='id11'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=registration&function=create&session=$session->idsession' class='btn btn-primary'>Register</a></td>";
    
    if(isset($_SESSION['user'])){
        if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
            echo "<td id='id40'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=updateView&id=$session->idsession' class='btn btn-primary'>Update</a></td>";
            echo "<td id='id43'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=delete&id=$session->idsession'class='btn btn-danger'>Delete</a></td>";
        }  
    }
    echo '</tr>';
}
?>
   </tr>
</table>

<?php require_once __DIR__.'/../footer.php'; ?>