<?php require_once __DIR__ . '/../header.php'; ?>
  <head>
     <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/test.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../public/assets/js/jsf.js"></script>

  </head>
<h1>Welcome to <?php echo $event->name; ?> event</h1><!-- comment -->

<div id="all">
    <li id="id0">
        Venue:
        <?php
        foreach ($venues as $venue) {
            if ($event->venue == $venue->idvenue) {
                echo "<td id='id10'><a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=venues&function=single&id=$venue->idvenue' class='btn btn-primary'>$venue->name</a></td>";
            }
        }
        ?>
    </li>
    </br>
    </br>
    <li id="id1">Starts: <?php echo $event->datestart ?></li>
    </br>
    </br>
    <li id="id2">Ends: <?php echo $event->dateend ?></li>

</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
