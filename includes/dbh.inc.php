<?php

$conn = mysqli_connect('localhost', 'root', '123456', 'scurf');

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}