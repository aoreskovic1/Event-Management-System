
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/~ao3886/iste-341/Project1/public/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</head>
<body>
<?php 
    $login = 'active show';
    $register = '';
    if(isset($errors['register'])) {
        $register = 'active show';
        $login = '';
    }
?>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $login?>" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" href="http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=auth&function=login">Login</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $register?>" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" href="http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=auth&function=register">Register</button>
        </li>
    </ul>
    <div class="tab-content w-50" id="pills-tabContent">
        <div class="tab-pane fade w-70 <?php echo $login?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0"> 
            <form method="POST" action="index.php?route=auth&function=loginUser">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name="username" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                
                <?php if(isset($errors['login'])) echo "<br><small class='text-danger' >".$errors['login']."</small>";?>
            </form>
        </div>
        <div class="tab-pane fade w-70 <?php echo $register?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <form method="POST" action="index.php?route=auth&function=registerUser">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name="username" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                    
                    <?php if(isset($errors['name'])) echo "<br><small class='text-danger' >".$errors['name']."</small>";?>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                
                    <?php if(isset($errors['password'])) echo "<br><small class='text-danger' >".$errors['password']."</small>";?>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <?php
                if (isset($error) && $error !== null)
                    echo $error;
                ?>
            </form>
        </div>
    </div>

</body>
</html>





