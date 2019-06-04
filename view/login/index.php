<div class="auth__container">
    <form action="index.php?page=login" method="POST">
    <input type="hidden" name="action" value="login"/> 
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username"/>
            <span class="username_error"></span>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password"/>
            <span class="password_error"></span>
        </div>
        <div class="form-group">
            <button class="btn auth-btn" type="submit">Login</button>
        </div>
    </form>
</div>

<p class="login__signup">No account yet? <a class="red-bold" href="index.php?page=register">Sign Up</a></p>
