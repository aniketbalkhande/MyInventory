<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
          <?php  
                if (!empty($page_title))
                  echo remove_junk($page_title);
                elseif(!empty($user))
                  echo ucfirst($user['name']);
                else echo "Simple inventory System";
          ?>
      </title>
      
      <!-- cdn -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      
      <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>" />

      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;800&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
       
  </head>
  <body>
    <?php  
      if ($session->isUserLoggedIn(true)): 
    ?>  
      <div class='container-fluid'> 

         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#">MyInventory</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <?php if($user['user_level'] === '1'): ?>
                  <!-- admin menu -->
                  <?php include_once('admin_menu.php');?>

               <?php elseif($user['user_level'] === '2'): ?>
                  <!-- Special user -->
                  <?php include_once('special_menu.php');?>

               <?php elseif($user['user_level'] === '3'): ?>
                  <!-- User menu -->
                  <?php include_once('user_menu.php');?>
               <?php endif;?>
            </div>

            <div class="navbar-nav justify-content-end">
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="profile-img">
                     <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline" > 
                     <span><?php echo remove_junk(ucfirst($user['name'])); ?></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="profile.php?id=<?php echo (int)$user['id'];?>">Profile</a>
                     <a class="dropdown-item" href="edit_account.php">Settings</a>
                     <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
               </div>
            </div>




         </nav>
      </div>



  <?php endif;?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript" src="libs/js/functions.js"></script>
</body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>