<?php
    require './app/config/config.php';
    require_once './app/helpers/Route.php';
    require_once './app/controller/EventController.php';
    require_once './app/controller/VenueController.php';
    require_once './app/controller/AuthController.php';
    require_once './app/controller/SessionController.php';
    require_once './app/controller/RegistrationController.php';
    require_once './app/controller/UserController.php';

    const ADMIN = 1;
    const MNGR = 2;
    const USER = 3;
    session_start();

# Events routes
    Route::get('events', 'index', new EventController(), [USER, MNGR, ADMIN]);
    Route::get('events', 'single', new EventController(), [USER, MNGR, ADMIN]);
    Route::get('events', 'delete', new EventController(), [MNGR, ADMIN]);
    Route::post('events', 'create', new EventController(), [MNGR, ADMIN]);
    Route::post('events', 'update', new EventController(), [MNGR, ADMIN]);
    Route::get('events', 'createView', new EventController(), [MNGR, ADMIN]);
    Route::get('events', 'updateView', new EventController(), [MNGR, ADMIN]);

# REGISTRATION routes
    Route::get('registration', 'index', new RegistrationController(), [USER, MNGR, ADMIN]);
    Route::get('registration', 'delete', new RegistrationController(), [USER, MNGR, ADMIN]);
    Route::get('registration', 'create', new RegistrationController(), [USER, MNGR, ADMIN]);

# USER routes
    Route::get('user', 'index', new UserController(), [ADMIN]);
    Route::get('user', 'single', new UserController(), [ADMIN]);
    Route::get('user', 'delete', new UserController(), [ADMIN]);
    Route::post('user', 'create', new UserController(), [ADMIN]);
    Route::post('user', 'update', new UserController(), [ADMIN]);
    Route::get('user', 'createView', new UserController(), [ADMIN]);
    Route::get('user', 'updateView', new UserController(), [ADMIN]);

#Session routes
    Route::get('session', 'index', new SessionController(), [USER, MNGR, ADMIN]);
    Route::get('session', 'single', new SessionController(), [USER, MNGR, ADMIN]);
    Route::get('session', 'delete', new SessionController(), [MNGR, ADMIN]);
    Route::post('session', 'create', new SessionController(), [MNGR, ADMIN]);
    Route::post('session', 'update', new SessionController(), [MNGR, ADMIN]);
    Route::get('session', 'createSessionView', new SessionController(), [MNGR, ADMIN]);
    Route::get('session', 'updateView', new SessionController(), [MNGR, ADMIN]);

# Venue routes
    Route::get('venues', 'index', new VenueController(), [USER, MNGR, ADMIN]);
    Route::get('venues', 'single', new VenueController(), [USER, MNGR, ADMIN]);
    Route::get('venues', 'delete', new VenueController(), [ADMIN]);
    Route::post('venues', 'update', new VenueController(), [ADMIN]);
    Route::get('venues', 'updateView', new VenueController(), [ADMIN]);
    Route::post('venues', 'create', new VenueController(), [ADMIN]);
    Route::get('venues', 'createView', new VenueController(), [ADMIN]);

# AUTH ROUTES
# Form routes
    Route::get('auth', 'login', new AuthController());
    Route::get('auth', 'register', new AuthController());

# Logic routes
    Route::post('auth', 'registerUser', new AuthController());
    Route::post('auth', 'loginUser', new AuthController());
    Route::post('auth', 'logout', new AuthController(), [USER, MNGR, ADMIN]);

# If there's no route or function provided, 
# forward the user to login
    if (!isset($_GET['route']) || !isset($_GET['function'])) {
        header('Location: http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=auth&function=login');
        die();
    }
    
    ?>