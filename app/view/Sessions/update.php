<?php require_once __DIR__ . '/../header.php'; ?>
<style>
          #ok2{
    padding-left: 250;
    padding-right: 250;
}
h2{
       margin-left:540;
    padding-bottom: 33;
}

#h22{
    margin-left:600;
    padding-bottom: 33;
}

</style>
<h2 id="h22"><?php
    $function = 'create';
    if (isset($session)) {
        echo $session->name;
        $function = 'update';
    } else
        echo "<h2>Create a new session</h2>";
    ?> </h2><!-- comment -->

<form method="POST" action="index.php?route=session&function=<?php echo $function; ?>">
    <div class="form-group" class="container" id="ok2">
        <input type='hidden' value="<?php if (isset($session)) echo $session->idsession ?>" name="id">
        </br>
        </br>
        <label for="Name"><b>Name:</b></label>
        <input class ='form-control' type="text" value="<?php if (isset($session)) echo $session->name ?>" name="name" required>
        <?php if(isset($errors['name'])) echo "<br><small class='text-danger' >".$errors['name']."</small>";?>
        </br>
        </br>
        <label for="datestart"><b>Date Start:</b></label>
        <input class ='form-control' type="text" value="<?php
        if (isset($session)) {
            echo $session->getStart();
        } 
        ?>" name="datestart" required>
        <?php if(isset($errors['datestart'])) echo "<br><small class='text-danger' >".$errors['datestart']."</small>";?>
        </br>
        </br>
        <label for="dateend"><b>Date End:</b></label>
        <input class ='form-control' type="text" value="<?php
        if (isset($session)) {
            echo $session->getEnd();
        } 
        ?>" name="dateend" required>
        <?php if(isset($errors['dateend'])) echo "<br><small class='text-danger' >".$errors['dateend']."</small>";?>
        </br>
        </br>
        <label for="numberallowed"><b>Number Allowed:</b></label>

        <input class ='form-control' type="number" value="<?php if (isset($session)) echo $session->numberallowed ?>" name="numberallowed" required>
        <?php if(isset($errors['numberallowed'])) echo "<br><small class='text-danger' >".$errors['numberallowed']."</small>";?>
        </br>
        </br>
        <label for="event">Choose event:</label>

        <select name="event" id="event">
            <?php
            foreach ($events as $event) {
                $selected = '';
                if ($event->idevent == $session->event)
                    $selected = 'selected';

                echo "<option value='$event->idevent' $selected>"
                . $event->name
                . "</option>";
            }
            ?>
        </select><!-- comment -->
        </br>
        </br>
        <button type="submit" class='btn btn-primary'>Save</button>

    </div>
</form>

<?php require_once __DIR__ . '/../footer.php'; ?>