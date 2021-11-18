<?php

session_start();

if( isset( $_SESSION[ 'count' ] ) )
    $_SESSION[ 'count' ] = intval( $_SESSION[ 'count' ] ) + 1;
else
    $_SESSION[ 'count' ] = 1;

header( "Location: " . $_SERVER[ 'HTTP_REFERER' ] );