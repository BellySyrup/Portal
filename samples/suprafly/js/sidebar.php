<?php
session_start();
$login_id = $_SESSION['login_id'];
$rider_name = $_SESSION['rider_name'];
session_write_close();

print("
<div id='sidebar'>
	<div id='login'>
		<div class='side_header'>
			<h2>Login</h2>
		</div>
");

if($login_id){
	print("
		<div class='side_content'>
			<span class='side_link'>Logged in as</span>
			<h4>$full_name</h4>
			<br /><br />

			<a href='' class='side_link'>Edit Profile</a> | <a href='' class='side_link'>View Cart</a>
		</div>
		
		<div class='side_btn'>							
			<a href='?logout=true' class='orng_btn'>LOGOUT</a>
		</div>
	</div>");
}else{
	print("
		<form method='post' action=''>
			<div class='side_content'>
				<a href='signup.php' class='side_link' >Not a member? Sign up for free!</a>
				<input type='text' name='email' value='Email' class='default_val' size='25'/>
				<br /><br />
				<input type='password' id='pass_hide' name='password'  value='' size='25'/>
				<input type='text' id='pass_show' value='Password' size='25'/>
				<a href='' class='side_link'>Forgot your password?</a>
			</div>
						
			<div class='side_btn'>							
				<input type='submit' name='submit' value='GO' />
			</div>
		</form>
	</div>");
}
print("			
	<div id='new_events'>
		<div class='side_header'>
			<h2>New Events</h2>
		</div>
		
		<div class='side_content'>
			<div class='events_excerpt'>
				<h4>DeathRace Tribute</h4>
				<p class='date'>26/01/2011</p>
				<p class='desc'>This course is tough, and definately not for the faint of heart.Good Luck Boys!</p>
			</div>
			
			<div class='events_excerpt'>
				<h4>DeathRace Tribute</h4>
				<p class='date'>26/01/2011</p>
				<p class='desc'>This course is tough, and definately not for the faint of heart.Good Luck Boys!</p>
			</div>
		</div>
		
		<div class='side_btn'>
			<a href='events.php' class='orng_btn'>MORE</a>
		</div>
	</div>
</div>
</div>");
?>