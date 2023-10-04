<?php
session_start()
?>
<?php
    session_destroy();
    
    header("Location: contacts.html");
	die();
?>
    