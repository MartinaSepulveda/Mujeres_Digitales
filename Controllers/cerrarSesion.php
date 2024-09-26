<?php

session_start();
session_destroy();

echo"<script> alert('Sesión cerrada correctamente') </script>";
echo"<script> location.href='../../index.php' </script>";
 
