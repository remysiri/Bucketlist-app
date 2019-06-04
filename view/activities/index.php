<h2 class="title-left-margin">Happening in <span class="red-bold">xdays xhours xminutes xseconds</span></h2>
<div class="fullwidth-item">
    <?php if(empty($active)): ?>
    <p>Geen actieve activiteit</p>
    <?php else: ?>
    <h3 class="activity__title"><?php echo $active["name"]; ?><span class="activity__more"><a href="">Read more</a></span></h3>
    <?php endif; ?>
</div>

<h2 class="title-left-margin">Top picks</h2>
<div class="fullwidth-item">
<?php if(empty($popular)): ?>
    <p>Geen actieve activiteit</p>
    <?php else: ?>
    <?php foreach($popular as $activity): ?>
    <h3 class="activity__title"><?php echo $activity["name"]; ?><span class="activity__more"><a href="">Read more</a></span></h3>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<h2 class="title-left-margin">Categories</h2>
<div class="grid-wrapper">
    <div class="four-grid-item">
    </div>
    <div class="four-grid-item">
    </div>
    <div class="four-grid-item">
    </div>
    <div class="four-grid-item">
    </div>
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
