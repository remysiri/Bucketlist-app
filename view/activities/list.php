<h2 class="title-left-margin"><span class="red-bold">Racing</span> Total <?php echo count($activities); ?> <?php if(count($activities) <= 1) { echo "activity"; } else { echo "activities"; } ?></h2>
<ul class="list__activity">
    <?php if(empty($activities)): ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
    <?php else: ?>
        <?php foreach($activities as $activity): ?>
            <li><h3><span class="red-bold"><?php echo $activity["id"]; ?>. </span><?php echo $activity["name"]; ?> <a href="" class="list__link">Read more</a></h3></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>