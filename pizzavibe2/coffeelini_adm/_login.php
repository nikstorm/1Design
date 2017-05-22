<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

if(isset($_SESSION["admin"])){ Header("Location: /Admin"); return; return;}
?>
<center style="padding-top:10%;" >
<div id="login" style="width:300px;">
<span class="text">Admin CP</span><BR/>
<div class="error" id="error_log" style="width:280px;">Login or password is incorrect</div><BR/>
<form role="form" name="frm" novalidate>
<input id="input_lodin" class="form-control" name="login" maxlength="20" type="text" placeholder="Login" value=""  onkeydown="enter(event.keyCode);" /><BR/><BR/>
<input id="input_pass" class="form-control"  name="password" maxlength="20" type="password" placeholder="Password" value="" onkeydown="enter(event.keyCode);" />

<div class="input_sign" title="In the admin panel" onClick="vhod()" >Login</div>
</form>
<div class="login_a" onClick="eff_blind('recovery', 'login')" >Password recovery</div>
</div>
<div id="recovery" style="width:300px; display:none;">
<span class="text">Password recovery</span><BR/>
<div class="error" id="error_log1"></div>
<div class="good" id="good_log"></div><BR/>
<input onkeydown="enter_recovery(event.keyCode);" id="input_email" class="form-control"  maxlength="100" type="text" placeholder="Email" value="" />
<div class="input_sign" title="Password recovery" onClick="rcovery_pass()">Recovery</div>
<div class="login_a" onClick="eff_blind('login', 'recovery')" >Sign in</div>
</div>
</center>