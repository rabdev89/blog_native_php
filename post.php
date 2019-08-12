<?php
namespace App;
use App\Services\Post as Post;
require_once __DIR__.'/vendor/autoload.php';
$post = new Post;

$data['title'] = '';
$data['small_desc'] = '';
$data['content'] = '';
$action = 'addPost';
$submit = 'ADD POST';
if(isset($_GET['a']) && $_GET['a'] === 'edit') {
  $p = $post->getById($_GET['id']);
  $data['title'] = $p->title;
  $data['small_desc'] = $p->small_desc;
  $data['content'] = $p->content;
  $action = 'editPost';
  $submit = 'Edit POST';
}

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
            <?php if(isset($_GET['a']) && $_GET['a'] === 'edit') { ?>
              
              <h1>Edit <?php echo $data['title'] ?></h1>
            <?php } else {?>
              <h1>Add Post</h1>
            <?php }?>
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
          
        <form class="form-horizontal" action='<?php echo $_SERVER['REQUEST_URI'] ?>' method="POST" autocomplete="off">
          
          <input type="hidden" name="action" value="<?php echo $action ?>">
          <input type="hidden" name="key" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
         
          <fieldset>
            <div id="legend">

            </div>
            <div class="control-group">
              <!-- Username -->
              <label class="control-label"  for="Title">Title *</label>
              <div class="controls">
                <input id="title" type="text" value="<?php echo $data['title']; ?>" name="title" class="form-control" placeholder="Please enter the post's title *" required="required" data-error="The title is required.">
                <p class="help-block"> Title needs to be a maximum of 50 characters</p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- E-mail -->
              <label class="control-label" for="Small description">Small description*</label>
              <div class="controls">
                <textarea id="small_desc" name="small_desc" class="form-control" placeholder="Write here a small description of your post that'll appear in the Blog page. Make it short and on point. *" rows="4" required="required" data-error="Please,leave us a message."><?php echo $data['small_desc']; ?></textarea>
                <p class="help-block with-errors"></p>
              </div>
            </div>
         
            <div class="control-group">
              <!-- Password-->
              <label class="control-label" for="Content">Content *</label>
              <div class="controls">
                <textarea id="content" name="content" class="form-control" placeholder="Content of your post *" rows="4" required="required" data-error="Kindly write your post's content"><?php echo $data['content']; ?></textarea>
                <p class="help-block with-errors"></p>
              </div>
            </div>
         
            
         
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button class="btn btn-success"><?php echo $submit ?></button>
              </div>
            </div>
          </fieldset>
        </form>

        <hr>


        </div>
      </div>
    </div>
  </section>

<?php

include('footer.php');