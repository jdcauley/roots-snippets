<?php

/**
 * Front-end login/logout
 */

if (is_user_logged_in()) : ?>

  <a button class="btn" href="<?php echo wp_logout_url(); ?>">Logout</a>

<?php else : ?>

  <form class="form-inline" name="loginform" id="loginform" action="<?php echo home_url(); ?>/wp-login.php" method="post">
    <input type="text" name="log" id="user_login" class="input-medium" value="" placeholder="Username">
    <input type="password" name="pwd" id="user_pass" class="input-medium" value="" placeholder="Password">
    <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="Log In">
    <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>">
    <input type="hidden" name="testcookie" value="1">
  </form>
   
<?php endif; ?>
