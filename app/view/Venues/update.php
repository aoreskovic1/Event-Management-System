<?php require_once __DIR__ . '/../header.php'; ?>
<head>
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/venue.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../public/assets/js/jsf.js"></script>

</head>
<style>
   
    #id9{
        padding-top: 30;
        padding-left: 260;
        padding-right: 300;
    }
    #ok2{
        margin-top: 33;
    }
    #ok1{
        margin-bottom: 33;
    }

</style>
<h1 id="h11"><?php
    $function = 'create';
    if (isset($venue)) {
        echo $venue->name;
        $function = 'update';
    } else
        echo "Create a venue";
    ?> </h1><!-- comment -->

<form method="POST" action="index.php?route=venues&function=<?php echo $function; ?>">
    <div class="form-group" id="id9">
        <input type='hidden' value="<?php if (isset($venue)) echo $venue->idvenue ?>" name="id">
        <label for="Name"><b>Name:</b></label>
        <input id="ok1"class="form-control" type="text" value="<?php if (isset($venue)) echo $venue->name ?>" name="name" required>
        <?php if (isset($errors['name'])) echo "<br><small class='text-danger' >" . $errors['name'] . "</small>"; ?>

        <label for="capacity"><b>Capacity:</b></label>
        <input class="form-control" type="number" value="<?php
        if (isset($venue)) {
            echo $venue->capacity;
        }
        ?>" name="capacity" required>
               <?php if (isset($errors['capacity'])) echo "<br><small class='text-danger' >" . $errors['capacity'] . "</small>"; ?>

        <button type="submit" class="btn btn-primary" id="ok2">Save</button>

    </div>
</form>

<?php
if (!empty($errors)) {
    echo "ERRORS:<br>";
    echo "<ol>";
    foreach ($errors as $error) {
        echo "<p class='err'>$error</p><br>";
    }
    echo "</ol>";
}
?>

<?php require_once __DIR__ . '/../footer.php'; ?>