<?php 
include('navbar.php');
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
  </head>
<style type="text/css">
	body {
  background: linear-gradient(130deg, #1a2a6c, #b21f1f 41.07%, #fdbb2d 76.05%);
  min-height: 100vh;
  font-family: sans-serif;
  background-size: cover;
}
@media only screen and (max-width: 600px) {
  body {
    background: linear-gradient(95deg, #1a2a6c, #b21f1f 41.07%, #fdbb2d 76.05%);
  }
}

.glass-card-grid {
  padding: 3rem 2rem 3rem 2rem;
  margin: 0;
  display: flex;
  overflow-x: hidden;
  position: relative;
}
@media only screen and (max-width: 600px) {
  .glass-card-grid {
    flex-direction: column;
  }
}
.glass-card-grid .glass-card {
  width: 300px;
  min-height: 350px;
  box-shadow: -2rem 0 3rem -2rem #000;
  padding: 1.5rem;
  color: #fff;
  display: flex;
  flex-direction: column;
  transition: 0.2s;
  margin: 0;
  border-radius: 10px;
  border: 1px solid rgba(255, 255, 255, 0.18);
  backdrop-filter: blur(15px);
  position: relative;
}
@media only screen and (max-width: 600px) {
  .glass-card-grid .glass-card {
    box-shadow: 0rem -20px 3rem -1rem #000;
  }
}
.glass-card-grid .glass-card:hover {
  transform: translateY(-1rem) rotate(3deg);
}
.glass-card-grid .glass-card:first-child:hover {
  transform: translate(-0.5rem, -1rem) rotate(3deg);
}
.glass-card-grid .glass-card:not(:first-child) {
  margin-left: -130px;
  box-shadow: -3rem 0 3rem -2rem #000;
}
@media only screen and (max-width: 600px) {
  .glass-card-grid .glass-card:not(:first-child) {
    margin-left: auto;
    margin-top: -50px;
    box-shadow: 0rem -20px 3rem -1rem #000;
  }
}
.glass-card-grid .glass-card .glass-card-title {
  font-size: 1.3rem;
  margin: 0 0 1rem;
}
.glass-card-grid .glass-card a {
  text-decoration: none;
  color: #fff;
}
.glass-card-grid .glass-card p {
  font-weight: normal;
  line-height: 1.5rem;
}
.glass-card-grid .glass-card .tags a {
  font-style: normal;
  font-weight: 800;
  text-transform: uppercase;
  color: #ff7a18;
  font-size: 0.66rem;
  margin-inline-end: 0.66rem;
}
.glass-card-grid .glass-card .author-row {
  margin-block-start: auto;
  display: grid;
  grid-template-columns: 40px 1fr;
  gap: 0.5rem;
  align-items: center;
  color: #565656;
  line-height: 1.3;
}
</style>
  <body>
<?php $new = "SELECT * FROM `packages`"; 
	  $execute = mysqli_query($db,$new);
	  $cards = mysqli_num_rows($execute);?>
    <div class="glass-card-grid">
<?php if ($cards>0) {
	while ($fetch = mysqli_fetch_assoc($execute)) {					
 ?>
 
      <article class="glass-card">

        <h3 class="glass-card-title">
          <h6 ><?php echo $fetch['package']; ?> </h6>
        </h3>
        <div class="tags">
          <a href="profile.php" rel="tag">#Profile</a>
          <a href="packages.php" rel="tag">#PACKAGES</a>
        </div>
        <p>
        <?php echo $fetch['description']; ?>
        </p>
        <h4 style="color: white">
        <?php echo $fetch['amount']; ?>$
        </h4>
        <div class="author-row">
          <a class="author-name" href="package_enrollment.php?id=<?php echo $fetch['id'] ?>">ENROLL  </a>
        </div>
      </article>
 <?php }} ?>
    </div>
  </body>
</html>
