<?php
    session_start();

//$_SESSION['time'] = date("H:i:s");
////echo $_SESSION['time'];
//header('Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
//
//
//exit();

    if( isset( $_POST[ 'content' ] ) && !empty( $_POST[ 'content' ] ) )
    {
        $db = new PDO( 'mysql:host=localhost;dbname=mini_course', 'root', '' );
        $db->exec( 'SET NAMES UTF8' );

        $sql = "SELECT * FROM tasks WHERE text=:text";

        $res = $db->prepare( $sql );
        $res->bindParam(':text', $_POST[ 'content' ] );
        $res->execute();

        $result = $res->rowCount();

        if( $result == 0 )
        {
            $sql = "INSERT INTO tasks ( text ) VALUES( :text )";
            $res = $db->prepare( $sql );
            $res->bindParam(':text', $_POST[ 'content' ] );
            $res->execute();

            $_SESSION[ 'success' ] = 'Записть успешно добавлена';
        }
        else
        {
            $_SESSION[ 'error' ] = 'Такая запись уже есть';
        }

        header('Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
    }
    else
    {
        $_SESSION[ 'error' ] = 'Заполните поле';
        header('Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
    }