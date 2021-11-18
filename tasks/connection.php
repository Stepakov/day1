<?php

function getConnection()
{
    $db = new PDO( 'mysql:host=localhost;dbname=mini_course', 'root', '' );
    $db->exec( 'SET NAMES UTF8' );

    return $db;
}