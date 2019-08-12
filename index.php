<?php
namespace App;
use App\Services\Post;

require_once __DIR__.'/vendor/autoload.php';

$postModel = new Post;
$posts = $postModel->getAll();

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
            <h1>Clean Blog</h1>
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
            <a href="blogs.php?uid=<?php echo $p->uid ?>"><?php echo $p->username ?></a>
            on <?php echo $p->date ?></p>
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