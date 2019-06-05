<?php if(empty($activity)): ?>
    <h3>Activiteit niet gevonden</h3>
<?php else: ?>
<h2 class="title-left-margin"><span class="red-bold"><?php echo $activity["name"]; ?></h2>
<ul class="list__activity">
    <li><h3><span class="red-bold"><?php echo $activity["id"]; ?>. </span><?php echo $activity["name"]; ?> <a href="" class="list__link">Read more</a></h3></li>
</ul>
<?php endif; ?>