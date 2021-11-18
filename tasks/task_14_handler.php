<?php
session_start();
include_once 'connection.php';

$db = getConnection();

$password = $_POST[ 'password' ];
$email = $_POST[ 'email' ];

if( !empty( $password) and !empty( $email ) )
{

    if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
    {
        $_SESSION[ 'error' ] = 'Введите email в правильном формате: some@gmail.com';
        header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
        exit();
    }

    $sql = "SELECT * FROM users WHERE email=:email";

    $res = $db->prepare( $sql );
    $res->bindParam(':email', $_POST[ 'email' ] );
    $res->execute();

    $user = $res->fetch(PDO::FETCH_ASSOC );
//    $result = $res->rowCount();


//    echo "<pre>";
//    print_r( $user );
//    echo "</pre>";
//    exit();

    if( empty( $user ) )
    {
        $_SESSION[ 'error' ] = 'Неверно введён email';
        header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
        exit();
    }

    if( !password_verify( $password, $user[ 'password' ] ) )
    {
        $_SESSION[ 'error' ] = 'Неверно введён password';
        header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
        exit();
    }

    $_SESSION[ 'success' ] = 'Вы успешно вошли';
    $_SESSION[ 'user' ] = $user;
    header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
    exit();

//    $sql = "INSERT INTO users ( email, password ) VALUES ( :email, :password ) ";
//    $res = $db->prepare( $sql );
//
//    $password = password_hash( $password, PASSWORD_DEFAULT );
//    $res->bindParam(':password', $password);
//    $res->bindParam(':email', $email);
//
//    $res->execute();
//
//    $_SESSION[ 'success' ] = 'Запись успешно добавлена';
//    header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
}
else
{
    $_SESSION[ 'error' ] = 'Заполните все поля';

    header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
}