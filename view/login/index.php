<div class="auth__container">
    <p><?php if(!empty($_SESSION["info"])) { echo $_SESSION["info"]; } ?></p>
    <form action="index.php?page=login" method="POST">
    <input type="hidden" name="action" value="login"/> 
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username"/>
            <span class="username_error"><?php if(!empty($errors["username"])) { echo $errors["username"];} ?></span>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password"/>
            <span class="password_error"><?php if(!empty($errors["password"])) { echo $errors["password"];} ?></span>
        </div>
        <div class="form-group">
            <button class="btn auth-btn" type="submit">Login</button>
        </div>
    </form>
</div>

<p class="login__signup">No account yet? <a class="red-bold" href="index.php?page=register">Sign Up</a></p>
