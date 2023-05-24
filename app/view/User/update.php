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
   #ok2{
    padding-left: 250;
    padding-right: 250;
}
  </style>
<h2 id="hh2"><?php 
                $function = 'create';
                if(isset($user)) {
                    echo "Upadate ".$user->name; 
                    $function = 'update';
                }
                else echo "Create a new user"; ?> </h2><!-- comment -->

<form method="POST" action="index.php?route=user&function=<?php echo $function; ?>">
    <div class="form-group" class="container" id="ok2">
        <input type='hidden' value="<?php if(isset($user))echo $user->idattendee ?>" name="id">

        <label for="Name"><b>Name:</b></label>
        <input class="form-control" type="text" value="<?php if(isset($user))echo $user->name ?>" name="name" required>
        <?php if(isset($errors['name'])) echo "<br><small class='text-danger' >".$errors['name']."</small>";?>
        </br>
        </br>
        <label for="password"><b>Password:</b></label>
        <input class="form-control" type="text" placeholder="Will update only if filled" name="password">
        <?php if(isset($errors['password'])) echo "<br><small class='text-danger' >".$errors['password']."</small>";?>
        </br>
        </br>
        <label for="role">Choose role:</label>

        <select name="role" id="role">
            <?php 
                foreach($roles as $role){
                    $selected = '';
                    if($role->idrole == $user->role) $selected = 'selected';
                    
                    echo "<option value='$role->idrole' $selected>"
                            . $role->name
                            . "</option>";
                }
            ?>
        </select>
        </br>
        </br><!-- comment -->

        <button type="submit" class="btn btn-primary">Save</button>

    </div>
</form>

<?php require_once __DIR__ . '/../footer.php'; ?>