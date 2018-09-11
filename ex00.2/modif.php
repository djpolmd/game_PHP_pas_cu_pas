<?php 
	
    $user = $_POST['login'];
	$newpasswd= $_POST['newpw'];
	$oldpasswd = $_POST['oldpw'];
	$key_hash = "starboy";

   	if ($_POST['submit'] != "OK") {
		echo "ERROR\n";
		return ;
	}
	
	function update_password($accounts, $index, $newhash) 
	{
		$accounts[$index]['passwd'] = $newhash;
		file_put_contents("../private/passwd", serialize($accounts));
	}

    if ($user && $newpasswd && $oldpasswd && strlen($user) > 0 && strlen($newpasswd) > 0 && strlen($oldpasswd) > 0)
    {
        if (file_exists("../private/passwd") == TRUE)
            $accounts = unserialize(file_get_contents("../private/passwd"));
		else
		{
			echo "ERRR\n";
			return ;
		}
		
		for($i = 0; $i < count($accounts); $i++)
		{
			if ($accounts[$i]['login'] == $user) 
				{
				if ($accounts[$i]['passwd'] == hash("sha256", $key_hash . $user. $oldpasswd)) 
					{
					update_password($accounts, $i, hash("sha256", $key_hash . $user . $newpasswd));
					header("Location: index.html");	
					echo "OK\n";
					return ;
					}
				}
		}
	}
    echo "ERROR\n";
?>
