<h2>Activities list</h2>
<a href="index.php?page=create">Create new activity</a>

<?php if(empty($activities)): ?>
<p>Geen activiteiten</p>
<?php else: ?>
<ul>
<?php foreach($activities as $activity): ?>
<li><?php echo $activity ?></li>
</ul>
<?php endforeach; ?>
<?php endif; ?>
