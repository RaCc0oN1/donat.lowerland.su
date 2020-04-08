<?php
    require ('steamauth/steamauth.php');
    # You would uncomment the line beneath to make it refresh the data every time the page is loaded
    // unset($_SESSION['steam_uptodate']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>ТЕст</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
if(!isset($_SESSION['steamid'])) {

    echo "Залогинься<br><br>";
    loginbutton(); //login button
    
}  else {
    include ('steamauth/userInfo.php');

    //Protected content
    echo "Привет - " . $steamprofile['personaname'] . "</br>";
    echo "Аватарка: </br>" . '<img src="'.$steamprofile['avatarfull'].'" title="" alt="" /><br>'; // Display their avatar!
    
    logoutbutton();
}    
?>  
</body>
</html>
<!--Version 4.0-->
 