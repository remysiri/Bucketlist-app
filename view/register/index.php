<form action="index.php?page=register" method="POST">
    <input type="hidden" name="action" value="addUser"/> 
    <span><?php if(!empty($_SESSION["info"])) { echo $_SESSION["info"]; } ?></span>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" />
        <span class="username_error"><?php if(!empty($errors["username"])) { echo $errors["username"];} ?></span>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" />
        <span class="email_error"><?php if(!empty($errors["email"])) { echo $errors["email"]; } ?></span>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <span class="password_error"><?php if(!empty($errors["password"])) { echo $errors["password"]; } ?></span>
    </div>
    <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm-password" id="confirm-password" />
        <span class="password_error"><?php if(!empty($errors["confirm-password"])) { echo $errors["confirm-password"]; } ?></span>
    </div>
    <div class="form-group">
        <button type="submit">Register</button>
    </div>
</form>