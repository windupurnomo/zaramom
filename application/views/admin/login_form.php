<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
// hanya untuk menampilkan informasi saja
if(isset($login_info))
{
	echo "<span style='background-color:#eee;padding:3px;'>";
	echo $login_info;
	echo '</span>';
}
?>

<form action="home/login" method="post" class="form-horizontal">
    <legend>Login Form</legend>
    <div class="control-group">
        <label class="control-label" for="username">Username</label>
        <div class="controls">
            <?php
                $attributes = array(
                    'name' => 'username',
                    'placeholder' => 'Username'
                );
				echo form_input($attributes);
				echo form_error('username');
			?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <?php
                $attributes = array(
                    'name' => 'password',
                    'placeholder' => 'Password'
                );
				echo form_password($attributes);
				echo form_error('password');
			?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Sign in</button>
        </div>
    </div>
</form>
