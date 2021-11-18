<?php
session_start();

if( isset( $_POST[ 'text' ] ) and !empty( $_POST[ 'text' ] ) )
{
    $_SESSION[ 'text' ] = $_POST[ 'text' ];
    header( 'Location: ' . $_SERVER[ 'HTTP_REFERER' ] );
}