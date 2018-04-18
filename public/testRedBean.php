<?php

require '../vendor/libs/rb.php';

$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);
R::freeze( true );
R::fancyDebug( TRUE );

//var_dump(R::testConnection());

//Create
//$cat = R::dispense( 'category' );
//$cat->title = 'Category 5';
//$cat->text = 'weekends';
//$id = R::store( $cat );
//var_dump($id);

//Read
//$cat = R::load('category', 2);
//echo $cat['title']; // $cat->'title';

//Update
//$cat = R::load('category', 4);
//echo $cat->title . '<br>';
//$cat->title = 'Category 4';
//$id = R::store( $cat );
//echo $cat->title . '<br>';

//$cat = R::dispense( 'category' );
//$cat->title = 'CAtegory 3434';
//$cat->id = 5;
//R::store( $cat );

//Delete
//$cat = R::load('category', 2);
//R::trash($cat);

//R::wipe('category');

//--------------------------------------
//$cats = R::findAll('category');
//$cats = R::findAll('category', 'id > ?', [3]);
//$cats = R::findAll('category', 'title LIKE ? ', ['%cat%']);
//$cats = R::findOne('category', 'id = 2 ');
//echo "<pre>";
//print_r($cats);