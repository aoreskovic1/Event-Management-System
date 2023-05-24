<?php require_once __DIR__ . '/../header.php'; ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/venue.css">
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
  <h2>Venues</h2>
          <?php
            if (isset($_SESSION['user'])) {
                if (in_array($_SESSION['user']->role, [ADMIN, MNGR])) {
                    echo "<a class='btn btn-primary' id='id0' href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=venues&function=createView' role='button'>Create a new venue</a>";

                }
            }
        
        ?>

<table>
    <tr>
        <th id="id">ID Venue</th>
        <th id="id2">Name</th>
        <th id="id3">Capacity</th>
    <tr>
        <?php
        foreach ($venues as $venue) {
            echo '<tr>';
            echo "<td id='id'>" . $venue->idvenue . "</td>";
            echo "<td id='id2'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=venues&function=single&id=$venue->idvenue' class='btn btn-primary'>" . $venue->name . "</td>";
            echo "<td id='id3'>" . $venue->capacity . "</td>";
            if (isset($_SESSION['user'])) {
                if (in_array($_SESSION['user']->role, [ADMIN, MNGR])) {
                    echo "<td id='id4'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=venues&function=updateView&id=$venue->idvenue' class='btn btn-primary'>Update</a></td>";
                    echo "<td id='id5'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=venues&function=delete&id=$venue->idvenue' class='btn btn-danger'>Delete</a></td>";
                }
            }
        }
        ?>
    </tr>
</table>

<?php require_once __DIR__ . '/../footer.php'; ?>