<?php
namespace App;
use App\Services\Post;
use App\Services\Comments as Comments;

require_once __DIR__.'/vendor/autoload.php';

$postModel = new Post;
$commentsData = new Comments;
$posts = $postModel->getById($_GET['id']);
$comments = $commentsData->getByBlogId($_GET['id']);


include('header.php'); 
include('nav.php'); 
?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $posts->title ?></h1>
            <h2 class="subheading"><?php echo $posts->small_desc ?></h2>
            <span class="meta">Posted by
              <a href="#"><?php echo $posts->username ?></a>
              on <?php echo $posts->date ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php echo nl2br(html_entity_decode($posts->content)) ?>
        </div>
      </div>
    </div>
  </article>

  
  <hr>

  <div class="container pb-cmnt-container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form class="form-inline" action='<?php echo $_SERVER['REQUEST_URI'] ?>' method="POST">
                    <textarea placeholder="Write your comment here!" name="content" class="pb-cmnt-textarea"></textarea>
                    
                        <input type="hidden" name="action" value="addComment">
                        <input type="hidden" name="blog_id" value="<?php echo $_GET['id'] ?>">
                        
                        <button class="btn btn-primary pull-right" type="submit">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

  <hr>


<div class="container" style="margin-bottom: 200px;">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-header">
          </div> 
           <div class="comments-list">
              <?php 
              foreach ($comments as $key => $c) { ?>
                <div class="media">
                    <div class="media-body">
                      <h4 class="media-heading user_name"><?php echo $c->username ?></h4>
                      <?php echo $c->content ?>
                    </div>
                    <p class="pull-right"><small><?php echo $c->date ?></small></p>
                </div>
              <?php 
              }
              ?>
           </div>
        </div>
    </div>
</div>

<style>
    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }

    .user_name{
        font-size:14px;
        font-weight: bold;
    }
    .comments-list .media{
        border-bottom: 1px dotted #ccc;
    }
    .pull-right {
        float: right!important;
    }
    .media >.pull-right {
        margin-left: 10px;
        flex: 1;
        margin: 5px 0;
        line-height: 0.5;
        font-size: 14px;
    }
    .media:first-child {
        margin-top: 0;
    } 
    .media-heading {
        margin: 0 0 5px;
    }
    .media, .media .media {
        margin-top: 15px;
    }
    .media, .media-body {
        overflow: hidden;
        zoom: 1;
    }
</style>

<?php

include('footer.php');