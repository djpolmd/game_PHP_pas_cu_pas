<?php 
	
    $user = $_POST['login'];
    $passwd = $_POST['passwd'];
    $hash_key = "starboy";
    
   	if ($_POST['submit'] != "OK")
   	{
		echo "ERROR\n";
		return ;
	}
	
    if ($user && $passwd && strlen($user) > 0 && strlen($passwd) > 0) {
        if (file_exists("../private/passwd") == TRUE)
            $accounts = unserialize(file_get_contents("../private/passwd"));
		else {
			if (file_exists("../private/") == false)
				mkdir("../private/");
            $accounts = array();
		}
        foreach($accounts as $account)
        {
            if ($account['login'] == $user) 
            {
                echo "ERROR\n";
                return ;
            }
        }
        $accounts = array_merge($accounts, array(array("login" => $user,
        "passwd" => hash("sha256", $hash_key . $user . $passwd))));
        file_put_contents("../private/passwd", serialize($accounts));
		header("Location: index.html");	
		echo "OK\n";
	}
    else {
        echo "ERROR\n";
    }
?>
