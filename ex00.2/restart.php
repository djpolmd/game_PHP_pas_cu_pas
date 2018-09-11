<?php
session_start();
        $_SESSION[player2X] = 19;
        $_SESSION[player2Y] = 19;
        $_SESSION[player1X] = 0;
        $_SESSION[player1Y] = 0;
        $_SESSION[player] = 'player2';
header("Location: game.php");

?>
