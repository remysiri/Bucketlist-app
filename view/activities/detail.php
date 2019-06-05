<h2 class="title-left-margin"><span class="red-bold"><?php echo $activity["name"]; ?></h2>
<p>Happening in <?php echo $days; ?>days <?php echo $hours; ?>hours <?php echo $minutes; ?>minutes <?php echo $seconds; ?>seconds</p>
<form action="index.php?page=list&category=<?php echo $_GET["category"]; ?>" method="POST">
    <input type="hidden" name="action" value="saveActivity"/>
    <input type="hidden" name="user-id" value="<?php echo $_SESSION["id"]; ?>"/>
    <input type="hidden" name="activity-id" value="<?php echo $activity["id"]; ?>"/>
    <button type="submit">Save activity</button>
</form>

<div class="fullwidth-item">
    <img class="activity__active-image" src="./assets/img/active.jpg"/>
</div>

<p><?php echo $activity["description"]; ?></p>