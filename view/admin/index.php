<h2 class="title-left-margin"><span class="red-bold"><?php if(!empty($_GET["category"])) { echo $_GET["category"]; } ?></span> Total <?php echo count($activities); ?> <?php if(count($activities) <= 1) { echo "activity"; } else { echo "activities"; } ?></h2>

<div class="table__wrapper-admin">
    <div class="table__header cell">Id</div>
    <div class="table__header cell">Activity Name</div>
    <div class="table__header cell">Category</div>
    <div class="table__header cell">Votes</div>
    <div class="table__header cell">Active</div>
    <div class="table__header cell">Start</div>
    <div class="table__header cell">Actions</div>

    <?php if(empty($activities)): ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
    <?php else: ?>
    <?php foreach($activities as $activity): ?>
    <div class="row">
        <div class="table__activity-item cell"><?php echo $activity["id"]; ?></div>
        <div class="table__activity-item cell"><?php echo $activity["name"]; ?></div>
        <div class="table__activity-item cell"><?php echo $activity["category"]; ?></div>
        <div class="table__activity-item cell"><?php echo $activity["votes"]; ?></div>
        <div class="table__activity-item cell"><?php echo $activity["active"]; ?></div>
        <div class="table__activity-item cell"><?php if($activity["start_time"] == null) { echo "No date"; } else { echo date("d-m-Y", strtotime($activity["start_time"])); } ?></div>
        <div class="table__activity-item cell"><a href="index.php?page=edit&id=<?php echo $activity["id"]; ?>" class="">Edit</a></div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>