<?php require_once __DIR__ . '/../header.php'; ?>
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
      #ok2{
    padding-left: 250;
    padding-right: 250;
}
  </style>
<h1 id="h1"><?php 
                $function = 'create';
                if(isset($event)) {
                    echo $event->name; 
                    $function = 'update';
                }
                else echo "Create a new event"; ?> </h1><!-- comment -->

<form method="POST" action="index.php?route=events&function=<?php echo $function; ?>">
    <div class="form-group" id="ok2">
        <input type='hidden' value="<?php if(isset($event))echo $event->idevent ?>" name="id">

        <label for="Name"><b>Name:</b></label>
        <input class="form-control" type="text" value="<?php if(isset($event))echo $event->name ?>" name="name" required>
        <?php if(isset($errors['name'])) echo "<br><small class='text-danger' >".$errors['name']."</small>";?>
        <br/>
        <br/>
        <label for="datestart"><b>Date Start</b></label>
        <input class="form-control" type="text" value="<?php if(isset($event)){echo $event->getStart();}?>" name="datestart" required>
        <?php if(isset($errors['datestart'])) echo "<br><small class='text-danger' >".$errors['datestart']."</small>";?>
        <br/>
        <br/>
        <label for="dateend"><b>Date End</b></label>
        <input class="form-control" type="text" value="<?php if(isset($event)){echo $event->getEnd();} ?>" name="dateend" required>
        <?php if(isset($errors['dateend'])) echo "<br><small class='text-danger' >".$errors['dateend']."</small>";?>
        <br/>
        <br/>
        <label for="numberallowed"><b>Number Allowed</b></label>
        <input class="form-control" type="number" value="<?php if(isset($event)) echo $event->numberallowed ?>" name="numberallowed" required>
        <?php if(isset($errors['numberallowed'])) echo "<br><small class='text-danger' >".$errors['numberallowed']."</small>";?>
        <br/>
        <br/>
        <label for="venue">Choose a venue:</label>
        <select name="venue" id="venue">
            <?php 
                foreach($venues as $venue){
                    $selected = '';
                    if($venue->idvenue == $event->venue) $selected = 'selected';
                    
                    echo "<option value='$venue->idvenue' $selected>"
                            . $venue->name
                            . "</option>";
                }
            ?>
        </select><!-- comment -->
        <br/>
        <br/>
        <button class= "btn btn-primary" type="submit">Save</button>

    </div>
</form>
               
<?php require_once __DIR__ . '/../footer.php'; ?>
