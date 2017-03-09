<?php
require 'Model.php';

try {
    $posts = getPosts();
    require 'view_home.php';

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require 'view_error.php';
}
