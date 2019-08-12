<?php
namespace App;
use App\Services\User as User;
require_once __DIR__.'/vendor/autoload.php';


$user = new User;
include('header.php'); 
include('nav.php'); 
?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Register User</h1>
            
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Register -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
        <form class="form-horizontal" action='register.php?register' method="POST" autocomplete="off">
          <input type="hidden" name="action" value="register">
          <input type="hidden" name="register">
          <fieldset>
            <div id="legend">
                <?php $user->display_info(); ?>
                <?php $user->display_errors(); ?>
            </div>
            <div class="control-group">
              <!-- Username -->
              <label class="control-label"  for="username">Username</label>
              <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- E-mail -->
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block">Please provide your E-mail</p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- Password-->
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Password should be at least 4 characters</p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- Password -->
              <label class="control-label"  for="password_confirm">Password (Confirm)</label>
              <div class="controls">
                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                <p class="help-block">Please confirm password</p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button class="btn btn-success">Register</button>
              </div>
            </div>
          </fieldset>
        </form>
        </div>
      </div>
    </div>
  </section>

<?php

include('footer.php');