<h2 class="title-left-margin">Happening in <span class="red-bold"><?php echo $days; ?></span>days <span class="red-bold"><?php echo $hours; ?></span>hours <span class="red-bold"><?php echo $minutes; ?></span>minutes <span class="red-bold"><?php echo $seconds; ?></span>seconds</h2>
<div class="fullwidth-item">
    <?php if(empty($active)): ?>
    <p>Geen actieve activiteit</p>
    <?php else: ?>
    <h3 class="activity__title bottom-left"><?php echo $active["name"]; ?><span class="activity__more"><a href="index.php?page=detail&id=<?php echo $active["id"]; ?>">Read more</a></span></h3>
    <img class="activity__active-image" src="./assets/img/active.jpg"/>
    <?php endif; ?>
</div>

<h2 class="title-left-margin">Top picks</h2>
<div class="fullwidth-item">
    <?php if(empty($popular)): ?>
    <p>Geen actieve activiteit</p>
    <?php else: ?>
    <?php foreach($popular as $activity): ?>
    <div class="slides">
        <img src="">
        <h3 class="activity__title bottom-left"><?php echo $activity["name"]; ?><span class="activity__more"><a href="index.php?page=detail&id=<?php echo $activity["id"]; ?>">Read more</a></span></h3>
    </div> 
    <?php endforeach; ?>
    <?php endif; ?>
    
</div>

<h2 class="title-left-margin">Categories</h2>
<div class="grid-wrapper">
    <a href="index.php?page=list&category=racing" class="four-grid-item">
        <h3 class="activity__title title-center">Racing</h3>
    </a>
    <a href="index.php?page=list&category=stunts" class="four-grid-item">
        <h3 class="activity__title title-center">Stunts</h3>
    </a>
    <a href="index.php?page=list&category=trackdays" class="four-grid-item">
        <h3 class="activity__title title-center">Track Days</h3>
    </a>
    <a href="index.php?page=list&category=events" class="four-grid-item">
        <h3 class="activity__title title-center">Events</h3>
    </a>
</div>

<h2 class="title-left-margin">Uncategorized</h2>

<ul class="list__activity">
    <?php if(empty($uncategorized)): ?>
        <?php if(!empty($_GET["user"])) { echo "<li><h3><span class='red-bold'>0. </span>U heeft nog geen bucketlist, maak nu uw bucketlist!</h3></li>"; } ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
    <?php else: ?>
        <?php foreach($uncategorized as $activity): ?>
            <li><h3><span class="red-bold"><?php echo $activity["id"]; ?>. </span><?php echo $activity["name"]; ?> <a href="index.php?page=detail&id=<?php echo $activity["id"]; ?>" class="list__link">Read more</a></h3></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>


    <script>
        var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
        </script>
