<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>

<div class='container-fluid'>
    <div id="home-img">
      <?php echo display_msg($msg); ?>  
      <img src="uploads/img/gif/1.gif">
    </div>
</div>