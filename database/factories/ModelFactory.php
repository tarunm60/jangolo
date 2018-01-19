<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname'      => $faker->firstName,
        'lastname'       => $faker->lastName,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'date' => $faker->dateTime,
    ];
});


$factory->define(App\Productcategory::class, function (Faker\Generator $faker) {

    $categoriesNames =
        ['Apéritifs', 'Boissons', 'Céréales', 'Dejeuné', 'Epices', 'Feculent', 'Legumes', 'Fruits', 'Huiles', 'Tubercules', 'Poissons', 'Viandes'];

    return [
        'title'       => $faker->unique()->randomElement($categoriesNames),
        'description' => $faker->sentence(),
        'status'      => $faker->randomElement(['PUBLISHED', 'UNPUBLISHED']),
        'parent_id'   => 0,
    ];
});
$factory->define(App\Productmeasure::class, function (Faker\Generator $faker) {

    $productsMeasures = [
        'Kg', 'Plaquette', 'Tete', 'Pièce', 'lot', 'sachet', 'tas', 'boite', 'Paquet', 'L', 'Boule',
    ];

    return [
        'measure'     => $faker->unique()->randomElement($productsMeasures),
        'description' => $faker->sentence(),
        'status'      => 1,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    $categoriesNames = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];

    return [
        'name'        => $faker->name,
        'namefr'      => $faker->name,
        'description' => $faker->sentence(),
        'status'      => $faker->randomElement([0, 1]),
        'parent'      => 0,
        'icon'        => 'l',
        'is_front'    => 1,

    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {

    $productsnames = [
        'Poulet', 'Vinaigre', 'Betterave', 'Chips Coco', 'Epice poisson', 'The Moringa',
        'Huile Coco', 'Huile Sesame', 'Gingimbre', 'Ananas', 'Piment',
        'Miel', 'Arachide', 'Riz', 'Tomate',

    ];
    $productsimages = [
        '59398d12e4230pate_darachide_mixfoods.jpg',
        '5919e4b8541bfepices_viandes.jpg',
        'riz_gvr_5kg.jpg',
        '593ef2431cffapiment_liquide.jpg',
        '594a567761535chips_orignal.jpg',
        '5970a91fd9364gingembre_miel_250.jpg',
        '594a567761535chips_orignal.jpg',
    ];

    return [
        'title'                   => $faker->randomElement($productsnames),
        'description'             => $faker->sentence(),
        'date'                    => $faker->dateTime,
        'publish_date'            => $faker->dateTime,
        'picture'                 => $faker->randomElement($productsimages),
        'parent_id'               => 0,
        'selected_for_newsletter' => 0,
        'measure_id' => $faker->randomElement(\App\Productmeasure::all()->pluck('id')->toArray()),
        'status'                  => 'PUBLISHED',
        'sale_price'              => $faker->numberBetween(1000, 20000),
        'category_id'             => $faker->randomElement(\App\Productcategory::all()->pluck('id')->toArray()),
    ];
});

