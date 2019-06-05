<form action="index.php?page=edit&id=<?php echo activity["id"]; ?>" method="POST">
<input type="hidden" name="action" value="UpdateActivity"/> 
    <div class="form-group">
        <label for="name">Activity Name</label>
        <input type="text" name="name" id="name" value="<?php echo $activity["name"]; ?>"/>
        <span class="name_error"><?php if(!empty($errors["name"])) { echo $errors["name"];} ?></span>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description"><?php echo $activity["description"]; ?></textarea>
        <span class="description_error"><?php if(!empty($errors["description"])) { echo $errors["description"]; } ?></span>
    </div>
    <div class="form-group">
        <select name="category">
            <option value="racing" <?php if($activity["category"] == "racing") { echo "selected"; } ?>>Racing</option>
            <option value="stunts" <?php if($activity["category"] == "stunts") { echo "selected"; } ?>>Stunts</option>
            <option value="sightseeing" <?php if($activity["category"] == "sightseeing") { echo "selected"; } ?>>Sightseeing</option>
            <option value="events" <?php if($activity["category"] == "events") { echo "selected"; } ?>>Events</option>
        </select>
    </div>
    <div class="form-group">
        <input type="datetime-local" name="start-time" id="start-time" value="<?php echo $activity["start_time"]; ?>"/>
    </div>
    <div class="form-group">
        <button type="submit">Update</button>
    </div>
</form>