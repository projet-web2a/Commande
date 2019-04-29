<?php
include_once 'loginC.php';
	if(isset($_POST['mail']) && isset($_POST['password']))
{
	$adminC = new adminC();
	$result = $adminC->verifierLogin($_POST['mail'],$_POST['password']);
	if($result->count==0)
	{
	header("location: index.php?err=champs"); 
	}
	else
	{
		session_start();
		$_SESSION['email'] = $result->email;
		$_SESSION['pwd'] = $result->pwd;
		$_SESSION['username'] = $result->username;
		$currentUrl = $_SESSION['currentURL'];
		

	header("location:index.php?action=yes"); 
	}

}
else
{
	header("location:index.php?err=champs");
}



 ?>