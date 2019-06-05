<h2 class="title-left-margin"><span class="red-bold"><?php if(!empty($_GET["category"])) { echo $_GET["category"]; } ?></span> Total <?php echo count($activities); ?> <?php if(count($activities) <= 1) { echo "activity"; } else { echo "activities"; } ?></h2>

<div class="table__wrapper-user">
    <?php if(empty($activities)): ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
    <?php else: ?>
    <?php foreach($activities as $activity): ?>
    <div class="row">
        <div class="table__activity-item-main cell center-align"><span class="red-bold"><?php echo $activity["id"]; ?></span></div>
        <div class="table__activity-item-main cell left-align"><?php echo $activity["name"]; ?></div>
        <div class="table__activity-item-main cell center-align"><a href="index.php?page=detail&id=<?php echo $activity["id"]; ?>" class="">Read more</a></div>

        <div class="row-dropdown">
        <div class="table__activity-item cell center-align"></div>
        <div class="table__activity-item cell left-align"><p class="color-gray"><?php echo $activity["description"]; ?></p></div>
        <div class="table__activity-item cell center-align"></div>
    </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
