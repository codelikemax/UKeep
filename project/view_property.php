<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

include 'components/save_send.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Property</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- view property section starts  -->

<section class="view-property">

   <h1 class="heading">property details</h1>

   <?php
      $select_properties = $conn->prepare("SELECT * FROM `property` WHERE id = ? ORDER BY date DESC LIMIT 1");
      $select_properties->execute([$get_id]);
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

         $property_id = $fetch_property['id'];

         $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_user->execute([$fetch_property['user_id']]);
         $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

         $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
         $select_saved->execute([$fetch_property['id'], $user_id]);
   ?>
   <div class="details">
     <div class="swiper images-container">
         <div class="swiper-wrapper">
            <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="" class="swiper-slide">
            <?php if(!empty($fetch_property['image_02'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_02']; ?>" alt="" class="swiper-slide">
            <?php } ?>
            <?php if(!empty($fetch_property['image_03'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_03']; ?>" alt="" class="swiper-slide">
            <?php } ?>
            <?php if(!empty($fetch_property['image_04'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_04']; ?>" alt="" class="swiper-slide">
            <?php } ?>
            <?php if(!empty($fetch_property['image_05'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_05']; ?>" alt="" class="swiper-slide">
            <?php } ?>
         </div>
         <div class="swiper-pagination"></div>
     </div>
      <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
      <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
      <div class="info">
         <p><i class="fas fa-cedi-sign"></i><span><?= $fetch_property['price']; ?></span></p>
         <p><i class="fas fa-user"></i><span><?= $fetch_user['name']; ?></span></p>
         <p><i class="fas fa-phone"></i><a href="tel:1234567890"><?= $fetch_user['number']; ?></a></p>
         <p><i class="fas fa-building"></i><span><?= $fetch_property['type']; ?></span></p>
         <p><i class="fas fa-house"></i><span><?= $fetch_property['offer']; ?></span></p>
         <p><i class="fas fa-calendar"></i><span><?= $fetch_property['date']; ?></span></p>
      </div>
      <h3 class="title">Details</h3>
      <div class="flex">
         <div class="box">
            <p><i>Rate:</i><span><?= $fetch_property['bhk']; ?> GHC/Day</span></p>
            <p><i>Deposit Amount : </i><span><span class="fas fa-cedi-sign" style="margin-right: .5rem;"></span><?= $fetch_property['deposite']; ?></span></p>
            <p><i>Status :</i><span><?= $fetch_property['status']; ?></span></p>
            <p><i>Room :</i><span><?= $fetch_property['bedroom']; ?></span></p>
            <p><i>Locker :</i><span><?= $fetch_property['bathroom']; ?></span></p>
            <p><i>Storeroom :</i><span><?= $fetch_property['balcony']; ?></span></p>
         </div>
         <div class="box">
            <p><i>Floor size :</i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            <p><i>Floor number :</i><span><?= $fetch_property['age']; ?> floor</span></p>
            <p><i>Total floors :</i><span><?= $fetch_property['total_floors']; ?></span></p>
            <p><i>Room Number:</i><span><?= $fetch_property['room_floor']; ?></span></p>
            <p><i>Furnished :</i><span><?= $fetch_property['furnished']; ?></span></p>
            <p><i>Loan :</i><span><?= $fetch_property['loan']; ?></span></p>
         </div>
      </div>
      <h3 class="title">Amenities</h3>
      <div class="flex">
         <div class="box">
            <p><i class="fas fa-<?php if($fetch_property['lift'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Lifts</span></p>
            <p><i class="fas fa-<?php if($fetch_property['security_guard'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Security guards</span></p>
            <p><i class="fas fa-<?php if($fetch_property['water_supply'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Water supply</span></p>
            <p><i class="fas fa-<?php if($fetch_property['power_backup'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>Power backup</span></p>
         </div>
      </div>
      <h3 class="title">description</h3>
      <p class="description"><?= $fetch_property['description']; ?></p>
      <form action="" method="post" class="flex-btn">
         <input type="hidden" name="property_id" value="<?= $property_id; ?>">
         <?php
            if($select_saved->rowCount() > 0){
         ?>
         <button type="submit" name="save" class="save"><i class="fas fa-bookmark"></i><span>S</span></button>
         <?php
            }else{ 
         ?>
         <button type="submit" name="save" class="save"><i class="far fa-bookmark"></i><span>Save</span></button>
         <?php
            }
         ?>
         <input type="submit" value="send enquiry" name="send" class="btn">
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Space not found! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">Add Space</a></p>';
   }
   ?>

</section>

<!-- view property section ends -->










<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

<script>

var swiper = new Swiper(".images-container", {
   effect: "coverflow",
   grabCursor: true,
   centeredSlides: true,
   slidesPerView: "auto",
   loop:true,
   coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 200,
      modifier: 3,
      slideShadows: true,
   },
   pagination: {
      el: ".swiper-pagination",
   },
});

</script>

</body>
</html>