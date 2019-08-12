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
            <h1>Login</h1>
            
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
          
        <form class="form-horizontal" action='login.php?login' method="POST" autocomplete="off">
          <input type="hidden" name="action" value="login">
          <fieldset>
            <div id="legend">
              <legend class=""><?php $user->display_errors(); ?></legend>
            </div>

            <div class="control-group">
              <!-- E-mail -->
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                
              </div>
            </div>
         
            <div class="control-group">
              <!-- Password-->
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                
              </div>
            </div>
         
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button class="btn btn-success">Login</button>
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