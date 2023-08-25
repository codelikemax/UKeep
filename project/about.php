<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about.png" alt="">
      </div>
      <div class="content">
         <h3>Why Choose Us?</h3>
         <p>After a number of surveys on campus, we learned the problems of the student body. We decided to curb the stress of item storage during vacagtions hence, the strong and hardworking team we have structured to help you out. Reach our team of experts and enjoy a stress-free vacation</p>
         <a href="contact.php" class="inline-btn">contact us</a>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="heading">Easy Steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Search Hall</h3>
         <p>Find your hall of choice, current resident or not, and choose from a variety of halls.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Contact Agents</h3>
         <p>Contact hall agents to process your booking and have your items moved.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Enjoy Top-Level Security</h3>
         <p>Rest assured that your items are safe once they are locked away with us.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="reviews">

   <h1 class="heading">Client's Reviews</h1>

   <div class="box-container">

      <div class="box">
         <div class="user">
            <img src="images/pic-7.png" alt="">
            <div>
               <h3>Philemon Forson</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"UKeep has been a game-changer for me. It's so versatile and customizable, which means I can easily adapt it to fit my changing storage needs over time. I also love how easy it is to access my belongings whenever I need them."</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-8.png" alt="">
            <div>
               <h3>Abena Eghan</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"I can't say enough good things about UKeep. It has completely transformed the way I organize my belongings, and I'm amazed at how much more space I have now. Plus, the system is very durable and built to last!</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-9.png" alt="">
            <div>
               <h3>Peter Amexo</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"I am extremely impressed with UKeep. The design is sleek and modern, and it's incredibly easy to use. I love how organized and clutter-free my home looks now that I have this system in place. Moving to Kumasi has never been easier!"</p>
      </div>
   </div>

</section>

<!-- review section ends -->


















<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>