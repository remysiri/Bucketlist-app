<h2 class="title-left-margin"><span class="red-bold"><?php if(!empty($_GET["category"])) { echo $_GET["category"]; } ?></span> Total <?php echo count($activities); ?> <?php if(count($activities) <= 1) { echo "activity"; } else { echo "activities"; } ?></h2>
<ul class="list__activity">
    <?php if(empty($activities)): ?>
        <?php if(!empty($_GET["user"])) { echo "<li><h3><span class='red-bold'>0. </span>U heeft nog geen bucketlist, maak nu uw bucketlist!</h3></li>"; } ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
    <?php else: ?>
        <?php foreach($activities as $activity): ?>
            <li><h3><span class="red-bold"><?php echo $activity["id"]; ?>. </span><?php echo $activity["name"]; ?><?php echo $activity["category"]; ?> <?php echo $activity["votes"]; ?> <?php echo $activity["active"]; ?> <a href="index.php?page=detail&id=<?php echo $activity["id"]; ?>" class="list__link">Edit</a><a href="index.php?page=detail&id=<?php echo $activity["id"]; ?>" class="list__link">Read more</a></h3></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>