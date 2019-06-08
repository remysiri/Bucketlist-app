<h2 class="title-left-margin"><span class="red-bold"><?php if(!empty($_GET["category"])) { echo $_GET["category"]; } ?></span> Total <?php echo count($activities); ?> <?php if(count($activities) <= 1) { echo "activity"; } else { echo "activities"; } ?></h2>

<div class="table__wrapper-user">
    <?php if(empty($activities)): ?>
        <?php if(!empty($_GET["user"])): ?>
        <li><h3><span class="red-bold">0. </span>U heeft nog geen bucketlist, maak nu een bucketlist <a href="">hier</a></h3></li>
        <?php else: ?>
        <li><h3><span class="red-bold">0. </span>Geen activiteiten</h3></li>
        <?php endif; ?>
    <?php else: ?>
    <?php foreach($activities as $activity): ?>
    <div class="row">
        <div class="table__activity-item-main cell center-align"><span class="red-bold"><?php echo $activity["id"]; ?></span></div>
        <div class="table__activity-item-main cell left-align"><?php echo $activity["name"]; ?></div>
        <div class="table__activity-item-main cell center-align">
            <a href="" class="readmore" data-id="<?php echo $activity["id"]; ?>">Read more</a>
            <?php if(!empty($_GET["user"])): ?>
                <form action="index.php?page=list&user=<?php echo $_SESSION["id"]; ?>" method="POST">
                    <input type="hidden" name="action" value="removeBucket">
                    <input type="hidden" name="activity-id" value="<?php echo $activity["id"]; ?>">
                    <input type="hidden" name="user-id" value="<?php echo $_SESSION["id"]; ?>">
                    <button type="submit">Remove</button>
                </form>
            <?php endif; ?>
        </div>

        <div class="row-dropdown dropdown-item-<?php echo $activity["id"]; ?>">
            <div class="table__activity-item cell center-align"></div>
            <div class="table__activity-item cell left-align">
                <p class="color-gray"><?php echo $activity["description"]; ?></p>
                <?php if(!empty($_GET["category"])): ?>
                    <form action="index.php?page=list&category=<?php echo $_GET["category"]; ?>" method="POST">
                        <input type="hidden" name="action" value="saveActivity"/>
                        <input type="hidden" name="user-id" value="<?php echo $_SESSION["id"]; ?>"/>
                        <input type="hidden" name="activity-id" value="<?php echo $activity["id"]; ?>"/>
                        <button type="submit">Save activity</button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="table__activity-item cell center-align"></div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
