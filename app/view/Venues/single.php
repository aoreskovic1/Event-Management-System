<?php require_once __DIR__.'/../header.php'; ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/venue.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<h1 id="h1">Welcome to <?php echo $venue->name; ?> venue</h1><!-- comment -->
<h3 id="h3">Capacity: <?php echo $venue->capacity; ?> </h3><!-- comment -->

<div class='d-flex flex-row flex-wrap'>
<?php


foreach($events as $event){
    
    $venue = '/';
    $venue_id = 0;
    $num = random_int(100, 200);
    echo "<div class='card m-5' style='width: 18rem;'>
        <div class='card-body'>
          <h3 class='card-title'>$event->name</h3>
          <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <p>Start: $event->datestart</p><br>
          <p>End: $event->dateend</p><br>
          <h4>Capacity: $event->numberallowed</h4>
                  
          <a href='http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=single&id=$event->idevent' class='btn btn-primary'>View event</a>
        </div>
      </div>";
    
}
?>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>