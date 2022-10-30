<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

// if(isset($_POST['add_to_cart'])){

//    $product_name = $_POST['product_name'];
   
//    $product_image = $_POST['product_image'];
//    $product_quantity = $_POST['product_quantity'];

//    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//    if(mysqli_num_rows($check_cart_numbers) > 0){
//       $message[] = 'already added to cart!';
//    }else{
//       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, quantity, image) VALUES('$user_id', '$product_name',  '$product_quantity', '$product_image')") or die('query failed');
//       $message[] = 'product added to cart!';
//    }

// }

// if(isset($_GET['down'])){
//     $down_id = $_GET['down'];
//     $down_image_query = mysqli_query($conn, "SELECT pdf FROM `products` WHERE id = '$down_id'") or die('query failed');
    // echo"<a href="<?php " download></a>";

    // header('location:admin_products.php');
//  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="about.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<!-- <section class="home">

   <div class="content">
      <h3>Welcome to Savant.</h3>
      
      <a href="about.php" class="white-btn">discover more</a>
   </div> -->

</section>

<section class="products">

  

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      
      <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
     
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <!-- <input type="submit" value="download" name="add_to_cart" class="btn"> -->
     

     <a href="download.php?down=<?php echo $fetch_products['pdf']; ?>" class="delete-btn" onclick="return confirm('download this product?');">
     download</a>
     
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   

</section>

<!-- <section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div> -->

<!-- </section>
 -->




<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
