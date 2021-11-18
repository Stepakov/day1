<?php
session_start();

include_once 'connection.php';

$db = getConnection();

echo "<pre>";
print_r( $_FILES );
echo "</pre>";

// img/demo/gallery/thumb

$uploads_dir = 'images';
$formats = [ 'png', 'jpg' ];

foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        // basename() может предотвратить атаку на файловую систему;
        // может быть целесообразным дополнительно проверить имя файла
        $name = basename($_FILES["images"]["name"][$key]);
        $getMime = explode( '.', $name );
        $mime = end( $getMime );
        if( in_array( $mime, $formats ) )
        {
//            echo "type = " . $_FILES["images"]['type'][$key] . '<br>';
//            echo "type2 = " .  $mime . '<br>';
//            echo "name = " . $name . "<br>";
//            echo "name2 = " . rand() . "." . $mime . "<br>";
            $name = rand() . "." . $mime;



            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $sql = "INSERT INTO images ( image ) VALUES ( :image ) ";
            $res = $db->prepare( $sql );


            $res->bindParam(':image',  $name);

            $res->execute();
        }

    }
}

$_SESSION[ 'success' ] = 'Картинки успешно добавленны';
header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
