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

<div class="table__wrapper-user">
    <?php if(empty($activities)): ?>
        <?php if(!empty($_GET["user"])): ?>
        <li><h3><span class="red-bold">0. </span>U heeft nog geen bucketlist, maak nu een bucketlist <a href="">hier</a></h3></li>
        <?php else: ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
        <?php endif; ?>
    <?php else: ?>
    <?php foreach($popular as $activity): ?>
    <div class="row">
        <div class="table__activity-item-main cell center-align"><span class="red-bold"><?php echo $activity["id"]; ?></span></div>
        <div class="table__activity-item-main cell left-align"><?php echo $activity["name"]; ?></div>
        <div class="table__activity-item-main cell center-align">
            <a href="" class="readmore" data-id="<?php echo $activity["id"]; ?>">Read more</a>
        </div>

        <div class="row-dropdown dropdown-item-<?php echo $activity["id"]; ?>">
            <div class="table__activity-item cell center-align"></div>
            <div class="table__activity-item cell left-align">
                <p class="color-gray"><?php echo $activity["description"]; ?></p>
            </div>
            <div class="table__activity-item cell center-align"></div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<h2 class="title-left-margin">Categories</h2>
<div class="grid-wrapper">
    <a href="index.php?page=list&category=racing" class="four-grid-item">
        <h3 class="activity__title title-center">Racing</h3>
        <img class="activity__category-image" src="./assets/img/racing.jpg"/>
    </a>
    <a href="index.php?page=list&category=stunts" class="four-grid-item">
        <h3 class="activity__title title-center">Stunts</h3>
        <img class="activity__category-image" src="./assets/img/stunts.jpg"/>
    </a>
    <a href="index.php?page=list&category=trackdays" class="four-grid-item">
        <h3 class="activity__title title-center">Sightseeing</h3>
        <img class="activity__category-image" src="./assets/img/sightseeing.jpg"/>
    </a>
    <a href="index.php?page=list&category=events" class="four-grid-item">
        <h3 class="activity__title title-center">Events</h3>
        <img class="activity__category-image" src="./assets/img/events.jpg"/>
    </a>
</div>


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
