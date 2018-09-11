<?php

session_start();

  if ($_GET['dir'] == 'Up')
  {
    if ($_SESSION[player] == 'player1')
      	$_SESSION[player1X] -= 1;
    else
    	$_SESSION[player2X] -= 1;
  }

  if ($_GET['dir'] == 'Down')
  {
    if ($_SESSION[player] == 'player1')
      	$_SESSION[player1X] += 1;
    else
      	$_SESSION[player2X] += 1;
  }
 
  if ($_GET['dir'] == 'Left')
  {
    if ($_SESSION[player] == 'player1')
      	$_SESSION[player1Y] -= 1;
    else
      	$_SESSION[player2Y] -= 1;
  }

  if ($_GET['dir'] == 'Right')
  {
    if ($_SESSION[player] == 'player1')
    	$_SESSION[player1Y] += 1;
    else
    	$_SESSION[player2Y] += 1;
  }

  if ($_GET['dir'] == 'Shut')
    {
      // some code
    }
  if ($_SESSION[player2X] > 19 || $_SESSION[player2Y] > 19 ||
      $_SESSION[player2X] < 0  || $_SESSION[player2Y] < 0 )
  {
    header("Location: winPlayer1.php");
    return;
  }

  if ( $_SESSION[player1X] > 19  || $_SESSION[player1Y] > 19 ||
       $_SESSION[player1X] < 0   || $_SESSION[player1Y] < 0 )
  {
    header("Location: winPlayer2.php");
    return;
  }
    header("Location: game.php");
?>
