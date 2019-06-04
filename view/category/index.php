<?php if(empty($activities)): ?>
<p>Geen activiteiten</p>
<?php else: ?>
<ul>
<?php foreach($activities as $activity): ?>
<li><?php echo $activity ?></li>
</ul>
<?php endforeach; ?>
<?php endif; ?>


