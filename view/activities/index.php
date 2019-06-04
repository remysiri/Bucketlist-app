<h2>Happening in<span>xdays xhours xminutes xseconds</span></h2>
<div class="">
</div>

<h2>Top picks</h2>
<div class="">
</div>

<h2>Categories</h2>
<div class="">
</div>

<?php if(empty($activities)): ?>
<p>Geen activiteiten</p>
<?php else: ?>
<ul>
<?php foreach($activities as $activity): ?>
<li><?php echo $activity ?></li>
</ul>
<?php endforeach; ?>
<?php endif; ?>
