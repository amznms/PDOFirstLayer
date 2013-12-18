<?php

include_once 'PDOFirstLayer.php';

$pdo = new MyPDO();

//Get All
$data = $pdo->getAll('SELECT * FROM posts');
#######view#####
echo "<pre>--------------------- LISTA ----------------------------<br>";
print_r($data);
echo "</pre>";
#######view#####

//insert
$id = $pdo->insert("INSERT INTO posts(title,body,created) VALUES('title test','description test',NOW())");
######view######
echo '<pre>------------------------ID------------------------------<br>';
echo $id;
echo '</pre>';
######view######

//Get First
$data = $pdo->getFirst('SELECT * FROM posts WHERE id=2');
#####view######
echo '<pre>------------------------ROW-----------------------------<br>';
print_r($data);
echo '</pre>';
#####view######