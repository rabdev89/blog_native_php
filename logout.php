<?php 
namespace App;
use App\Services\User;
require_once __DIR__.'/vendor/autoload.php';

$user = new User;
$logout = $user->logout();
?>
