<?php
namespace App;
use App\Services\Post;
use App\Services\User as User;

require_once __DIR__.'/vendor/autoload.php';

$postModel = new Post;
$posts = $postModel->getByUserId($_GET['uid']);

$userModel = new User;
$user = $userModel->getUserById($_GET['uid']);


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
            <h1><?php echo $user->username ?> Page Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<?php 
        foreach ($posts as $key => $p) { ?>
        <div class="post-preview">
          <a href="article.php?id=<?php echo $p->id ?>">
            <h2 class="post-title">
              <?php echo $p->title ?>
            </h2>
            <h3 class="post-subtitle">
              <?php echo $p->small_desc ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="article.php?id=<?php echo $p->id ?>"><?php echo $p->username ?></a>
            on <?php echo $p->date ?></p>
            <div class="form-row">
              <div class="_col col-xs-6"><a href="post.php?a=edit&amp;id=<?php echo $p->id ?>" class="btn btn-primary btn-sm">Edit</a></div>
              <div class="_col">
                <form 
                  name="delete" 
                  onsubmit="return confirm('Do you really want to delete this article?');"
                  action="blogs.php?a=delete&amp;uid=<?php echo $p->uid ?>" 
                  method="post"
                  class="link">
                  <button type="submit" name="delete" value="<?php echo $p->id ?>" class="btn btn-dark">
                      Delete
                  </button>
                </form>
              </div>
            </div>
        </div>
        <hr>
        <?php 
        }
      	?>

      </div>
    </div>
  </div>
<?php

include('footer.php');