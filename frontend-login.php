// Frontend Login and Logout for Roots

<?php if (is_user_logged_in()) : ?>
     
     <a button class="btn" href="<?php echo wp_logout_url(); ?>">Logout</a>
  
     <?php else : ?>
 
        <form class="form-inline" name="loginform" id="loginform" action="/wp-login.php" method="post" style="margin: 0px" />
            <input type="text" name="log" id="user_login" class="input-medium" value="" tabindex="10" placeholder="Username" required="required" />
            <input type="password" name="pwd" id="user_pass" class="input-medium" value="" tabindex="20" placeholder="Password" required="required" />
            <input type="submit" name="wp-submit" id="wp-submit" class="btn-primary" value="Log In" tabindex="100" />
            <input type="hidden" name="redirect_to" value="/" />
            <input type="hidden" name="testcookie" value="1" />
        </form>
   
<?php endif; ?>
