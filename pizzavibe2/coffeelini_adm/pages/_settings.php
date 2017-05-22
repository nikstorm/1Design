<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################
    $data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[1]);
	$dat_login = $dat[0];
	$dat_email = $dat[1];
?>
<span id="text">Settings <span>Change your username, email, and password here</span></span>
<div class="menu_adm_block_a_line"></div>
<div class="pod_zagol"><i class="fa fa-fw fa-wrench"></i> Settings </div>
<center>
<span class="text">Settings Admin</span><BR/>
<div style="text-align:left;width:70%;min-width:600px;">
<div class="error" id="error_log" style="width:97%;"></div>
<div class="good" id="good_log"  style="width:97%;"></div>
<div style="margin-top:20px;">
<span id="title_inp">Login:</span>
<input onkeydown="enter_set(event.keyCode);" id="re_login" class="form-control form-nas" maxlength="20" type="text" placeholder="Login" value="<?=$dat_login;?>" />
</div>
<div style="margin-top:20px;">
<span id="title_inp">Email:</span>
<input onkeydown="enter_set(event.keyCode);" id="re_email" class="form-control form-nas" maxlength="50" type="text" placeholder="Email" value="<?=$dat_email;?>" />
</div>
<div style="margin-top:20px;">
<span id="title_inp">Current Password (if you want to change it):</span>
<input onkeydown="enter_set(event.keyCode);" id="pass" class="form-control form-nas" maxlength="20" type="password" placeholder="Password" value="" />
</div><div style="margin-top:20px;">
<span id="title_inp">New Password (if you want to change it):</span>
<input onkeydown="enter_set(event.keyCode);" id="pass_new" class="form-control form-nas" maxlength="20" type="password" placeholder="New Password" value="" />
</div><div style="margin-top:20px;">
<span id="title_inp">New Repeat Password:</span>
<input onkeydown="enter_set(event.keyCode);" id="re_pass_new" class="form-control form-nas" maxlength="20" type="password" placeholder="Repeat Password" value="" />
</div>
<BR/><div class="input_sign inp_save" title="Save Settings" onClick="settinadmin(), start_save()" >Save</div>
</div>
</center>