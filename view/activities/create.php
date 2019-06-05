<form action="index.php?page=create" method="POST">
    <input type="hidden" name="action" value="createActivity"/> 
    <span><?php if(!empty($_SESSION["info"])) { echo $_SESSION["info"]; } ?></span>
    <div class="form-group">
        <label for="name">Activity Name</label>
        <input type="text" name="name" id="name" />
        <span class="name_error"><?php if(!empty($errors["name"])) { echo $errors["name"];} ?></span>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description"></textarea>
        <span class="description_error"><?php if(!empty($errors["description"])) { echo $errors["description"]; } ?></span>
    </div>
    <div class="form-group">
        <select name="category">
            <option value="racing">Racing</option>
            <option value="stunts">Stunts</option>
            <option value="sightseeing">Sightseeing</option>
            <option value="events">Events</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit">Create</button>
    </div>
</form>