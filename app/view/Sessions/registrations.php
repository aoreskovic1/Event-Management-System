<?php require_once __DIR__.'/../header.php'; ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/reg.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../public/assets/js/jsf.js"></script>

  </head>

<h1 id="h1">Registrations</h1><!-- comment -->

<table>
    <tr>
        <th id="h2">ID</th>
        <th id="h3">Name</th>
        <th id="h4">Start</th>
        <th id="h5">End</th>
        <th id="h6">Number </th>
        <?php
            if(isset($_SESSION['user'])){
                
                if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
                    echo "<th id='h7'>Manage</th>";
                }
            }
        ?>
    <tr>
<?php
$user = $_SESSION['user']->idattendee;

foreach($sessions as $session){
    echo '<tr>';
    echo "<td id='h2'>".$session->idsession."</td>";
    echo "<td id='h3'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=single&id=$session->idsession' class='btn btn-primary'>".$session->name."</td>";
    echo "<td id='h4'>".$session->startdate."</td>";
    echo "<td id='h5'>".$session->enddate."</td>";
    echo "<td id='h6'>".$session->numberallowed."</td>";
    echo "<td id='h7'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=registration&function=delete&session=$session->idsession&attendee=$user' class='btn btn-danger'>Unregister</a></td>";
    
    if(isset($_SESSION['user'])){
        if(in_array($_SESSION['user']->role, [ADMIN, MNGR])){
                echo "<td id='h8'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=updateView&id=$session->idsession' class='btn btn-primary'>Update</a></td>";
                echo "<td id='h9'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=session&function=delete&id=$session->idsession' class='btn btn-danger'>Delete</a></td>";
           
        }
    }
    echo '</tr>';
}
?>
   </tr>
</table>

<?php require_once __DIR__.'/../footer.php'; ?>