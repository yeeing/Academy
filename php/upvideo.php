<?php
include 'dbh.php';
$dbh=new dbh();
$sth=$dbh->prepare('INSERT INTO video(name) VALUES(?)');
$sth->execute(array($_FILES['file']['name']));
$sth=$dbh->prepare('SELECT id FROM video WHERE name=?');
$sth->execute(array($_FILES['file']['name']));
move_uploaded_file($_FILES['file']['tmp_name'],'../videos/'.$sth->fetch()['id']);
header("Location: ../index.html");
