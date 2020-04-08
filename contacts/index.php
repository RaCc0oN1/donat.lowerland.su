<?php
    require ('steamauth/steamauth.php');
	require ('MyArenaAPI.php');
	$token = ''; // Токен управления сервером
    $api = new MyArenaAPI($token);
	$info = $api->status();

$info['online'];        // Boolean значение статуса сервера (TRUE - работает, FALSE - не работает)

//echo $info['status'];       // Вывод статуса сервера (Выключен, Работает, Запускается)
//echo $info['game'];         // Игра (cstrike, tf2, czero...)
//echo $info['engine'];       // Движок сервера (halflife, source, samp...)
//echo $info['ip'];           // IP сервера
//echo $info['port'];         // Порт сервера
//echo $info['name'];         // Имя сервера
//echo $info['map'];          // Текущая карта
//echo $info['curPlayers'];   // Игроков на сервере
//echo $info['maxPlayers'];   // Кол-во слотов
	include ('steamauth/userInfo.php');
	function toSteamID($id64) { // ебала
    if (is_numeric($id64) && strlen($id64) >= 16) {
        $z = bcdiv(bcsub($id64, '76561197960265728'), '2');
    } elseif (is_numeric($id64)) {
        $z = bcdiv($id64, '2'); 
    } else {
        return $id64; 
    }
    $y = bcmod($id64, '2');
    return 'STEAM_0:' . $y . ':' . floor($z);
}   
$id64 = $steamprofile["steamid"];
$steamid = toSteamID($id64);
$uniid = crc32('gm_'.$steamid.'_gm'); // полная пизда
/////////		
$mysqli = new mysqli("localhost", "ars899_IRS", "IRS_Project21009", "ars899_DarkRP");
$res1 = 0;
$res = $mysqli->query("SELECT `points` FROM `pointshop_data` WHERE `uniqueid` = ".$uniid);
if ($res != null){
$row = $res->fetch_assoc();
$res1 = 0;
$res1 = $row['points'];}	
if ($res1 == 0) {
	$res1 = " нет";
}	
/*////////
$res3 = "0";
$res2 = $mysqli->query("SELECT `wallet` FROM `darkrp_player` WHERE `uid` = ".$uniid);
$row1 = $res2->fetch_assoc();
$res3 = $row1['wallet'];
//////
$salesq = $mysqli->query("SELECT `sales` FROM `sales_data`");
$row5 = $salesq->fetch_assoc();
$sales = $row5['sales'];
///////
$res6 = $mysqli->query("SELECT `rubl` FROM `rub_data` WHERE `uniqueid` = ".$uniid);
$row4 = $res6->fetch_assoc();
$res6 = 0;
if ($row4['rubl'] != 0) {
$res6 = $row4['rubl'];	
} */
?>


<!DOCTYPE html>
<html>
<head>
    <title>IRS</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>	  
	  <meta charset="utf-8">
</head>
<body>
<header>
  <nav>
    <div class="nav-wrapper">
      <a href="" class="brand-logo"><font face="Impact">IRS-Project</font></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <? echo '<li><a href="http://irs-project.ru" ><font face="Impact">Донат</font></a></li> '; ?>
		<? echo '<li class="active"><a href="http://irs-project.ru/contacts" ><font face="Impact">F.A.Q</font></a></li> '; ?>
		<li><?php
		
if(!isset($_SESSION['steamid'])) {
	
    loginbutton();
    
}  else {
	
    echo '<li><img class="circle" src='.$steamprofile["avatarmedium"].' title="" alt="" /></li> ';
	echo '<li><a href="'.$steamprofile['profileurl'].'" target="_blank"> '.$steamprofile["personaname"].' </a></li> ';
	echo "<li><a> Поинтов: ".$res1."</a></li> ";

    logoutbutton();
	
}	

?> 
 </li>
      </ul>
    </div>
  </nav> </header> <main> 

        <div class="row">
        <div class="col s12 m6">

          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
			
              <span class="card-title"><font face="Impact">Контакты<font></span>
				<li><a class="grey-text text-lighten-3" target="_blank" href="https://vk.com/mrsupernafania">Макс Дребников ВК</a></li>
                  <li><a class="grey-text text-lighten-3" target="_blank" href="https://vk.com/maestro_hunter">Влад Паньков ВК</a></li>
			                  <h5 class="white-text"><font face="Impact">Ссылки<font></h5>
                <ul>
				<li><a class="grey-text text-lighten-3" target="_blank" href="https://vk.com/topic-114277092_35537804">ЧаВО?!</a></li>
                  <li><a class="grey-text text-lighten-3" target="_blank" href="https://vk.com/irs_gameproject">Группа ВКонтакте</a></li>
                  <li><a class="grey-text text-lighten-3"  target="_blank" href="EROR 404">Коллекция Аддонов </a></li>
				  <li><a class="grey-text text-lighten-3"  target="_blank" href="steam://connect/46.174.53.70:27015/?">Присоединиться к серверу </a></li>

                </ul>

             
              <p>Вы можете связаться с нами по почте "racc0on2@mail.ru"

</div> 
            </div>
          </div> </div> 

</main>
        <footer class="page-footer">
		
          <div class="footer-copyright">
            <div class="container">
  			<a href="https://passport.webmoney.ru/asp/CertView.asp?wmid=132474446378" target="_blank"> 
<img border="0" src="//cdn.web.money/passport/atstimg/88x31_user/88x31_wm_v_blue_on_white_ru.png"/> 
<a href="http://www.megastock.ru/" target="_blank"><img src="http://irs-project.ru/acc_blue_on_white_ru.png" alt="www.megastock.ru" border="0"/></a>
</a>   
       © 2017 IRS Project
	
            </div>	
	 
          </div>		  
        </footer>
</body>
</html>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?142"></script>

<!-- VK Widget -->
<div id="vk_community_messages"></div>
<script type="text/javascript">
VK.Widgets.CommunityMessages("vk_community_messages", 114277092, {disableExpandChatSound: "1",tooltipButtonText: "Есть вопрос?"});
</script>

 <!-- <div class="row">
    <form class="s2" action="" method="POST">
     	  <div class="row">
<div id="don"><h5>Введите кол-во поинтов</h5>1 поинт = 10 патронов</div> 
        <div class="input-field col s2">
	<input type="text" name="money" maxlength="5"></input> </div> <button class="btn waves-effect waves-light" type="submit" name="action">✔
  </button>  
	</form>	
<div id="don"><h5></h5></div> -->	