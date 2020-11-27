<?php

session_start();
require_once('dbconnect.php');

if (!isset($_POST['body'])) {
    exit;
}

$user_id= $_SESSION['user'];
$userData = $db->users->findOne( array('_id' =>$user_id));
$body = substr($_POST['body'], 0, 140);
$date = date('d-Y-m H:i:s');

$db->tweets->insertOne( array(
              'UID' => $user_id,
              'authorName' => $userData['username'],
              'body' => $body,
              'created' => $date
                    ));

header('Location: home.php');