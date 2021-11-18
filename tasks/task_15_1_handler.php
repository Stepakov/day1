<?php
session_start();

if( isset( $_GET[ 'image' ] ) and !empty( $_GET[ 'image' ] ) )
{
    $id = $_GET[ 'image' ];

    include_once 'connection.php';

    $db = getConnection();

    $sql = "SELECT * FROM images WHERE id=:id";

    $res = $db->prepare( $sql );
    $res->bindParam(':id', $id );
    $res->execute();

    $image = $res->fetch(PDO::FETCH_ASSOC);

    if( empty( $image ) )
    {
        $_SESSION[ 'error' ] = 'Такого файла нет';
        header( 'Location: task_15_1.php' );
        exit();
    }

    $sql = "DELETE FROM images WHERE id=:id";

    $res = $db->prepare( $sql );
    $res->bindParam(':id', $id );
    $res->execute();

    unlink( 'images/' . $image[ 'image' ] );

    $_SESSION[ 'success' ] = 'Файл удалён успешно';
    header( 'Location: task_15_1.php' );
}
