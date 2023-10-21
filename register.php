<?php
define("BR","<br>");
print_r ($_POST);

if(isset($_POST['fullname']))
{
   echo "Fullname:" . $_POST ["fullname"] . BR;
   echo "Username:" . $_POST ["uname"] . BR;
   echo "Password:" . $_POST ["pass1"] . BR;
   echo "Confirm Password:" . $_POST ["pass2"] . BR;
}
?> 
