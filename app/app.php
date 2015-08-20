<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";

    $app = new Silex\Application();
    $app['debug'] = true;
    $server = 'mysql:host=localhost;dbname=restaurant_cuisine';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll(), 'form_check' => false));

    });

    $app->get("/form_cuisine", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll(), 'form_check' => true));

    });

    $app->post("/add_cuisine", function() use ($app) {
        $cuisine = new Cuisine($_POST['type']);
        $cuisine->save();

        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll(), 'form_check' => false));

    });

    $app->post("/delete_cuisines", function() use ($app) {
        Cuisine::deleteAll();
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll(), 'form_check' => false));

    });

    $app->get("/cuisines/{id}", function($id) use ($app) {
        $cuisine = Cuisine::find($id);
        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'restaurants' => $cuisine->getRestaurants(), 'form_check' => false));
    });

    $app->get("/form_restaurant", function() use ($app) {
        $cuisine = Cuisine::find($_GET['cuisine_id']);
        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'restaurants' => $cuisine->getRestaurants(), 'form_check' => true));
    });

    $app->post("/add_restaurant", function() use ($app) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $website = $_POST['website'];
        $cuisine_id = $_POST['cuisine_id'];
        $restaurant = new Restaurant($name, $id = null, $phone, $address, $website, $cuisine_id);
        $restaurant->save();

        $cuisine = Cuisine::find($cuisine_id);
        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'restaurants' => $cuisine->getRestaurants(), 'form_check' => false));
    });

    $app->get("/restaurants/{id}", function($id) use ($app) {
        $restaurant = Restaurant::find($id);

        return $app['twig']->render('restaurant.html.twig', array('restaurant' => $restaurant, 'form_check' => false));
    });

    $app->get("/form_restaurant_update", function() use ($app) {
        $restaurant = Restaurant::find($_GET['restaurant_id']);
        return $app['twig']->render('restaurant.html.twig', array('restaurant' => $restaurant, 'form_check' => true));
    });

    $app->patch("/update_restaurant", function() use ($app) {
        $name = $_POST['name'];
        $restaurant_id = $_POST['restaurant_id'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $website = $_POST['website'];
        $cuisine_id = $_POST['cuisine_id'];

        $restaurant = Restaurant::find($restaurant_id);
        var_dump($restaurant);
        $restaurant->update_restaurant($name, $restaurant_id, $phone, $address, $website, $cuisine_id);
        $result = Restaurant::find($restaurant_id);
        var_dump($result);


        return $app['twig']->render('restaurant.html.twig', array('restaurant' => $restaurant, 'form_check' => false));
    });


    return $app;
?>
