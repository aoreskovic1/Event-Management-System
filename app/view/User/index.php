<?php require_once __DIR__ . '/../header.php'; ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/user.css">
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
<h2>Users</h2>

<a class="btn btn-primary" id="id0"href="http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=user&function=createView" role="button">Create a new user</a>
<table>
    <tr>
        <th id="h1">ID</th>
        <th id="h2">Name</th>
        <th id="h3">Role</th>
        <th id="h4">Manage</th>
    <tr>
        <?php
        foreach ($users as $user) {
            echo '<tr>';
            echo "<td id='h1'>" . $user->idattendee . "</td>";
            echo "<td id='h2'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=user&function=single&id=$user->idattendee'class='btn btn-primary'>" . $user->name . "</td>";
            echo "<td id='h3'>" . $roleArray[$user->role] . "</td>";
            echo "<td id='id10'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=user&function=updateView&id=$user->idattendee' class='btn btn-primary'>Update</a></td>";
            echo "<td id='id11'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=user&function=delete&id=$user->idattendee' class='btn btn-danger'>Delete</a></td>";
            echo '</tr>';
        }
        ?>
    </tr>
</table>

<?php require_once __DIR__ . '/../footer.php'; ?>