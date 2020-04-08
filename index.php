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
$mysqli = new mysqli("localhost", "iluksa_mybb1", "BH&fY5c&", "iluksa_mybb1");
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
    <title>LandProject | Garry's Mod</title>
  <meta charset="utf-8" />
  <meta name="description" content="Проект серверов в Garry's Mod" />
  <meta name="keywords" content="Garry's mod, gmod, darkrp, dark rp, LandProject, lowerland, overland" />
  <link rel="stylesheet" type="text/css" href="style.css" />
 <!-- <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/> -->
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</head>
<body>
<!--
Made by PEV
-->
    <!--<img srс="https://images.wallpaperscraft.ru/image/mashina_noch_sneg_143477_1920x1080.jpg" width="100%" height="100%" />-->
  <div id="Block1">
   <div id="logo1">
     <a href="http://landproject.su/" title="Главная страница">
     <img alt="Logo" src="photo/logo.png"/>
   </div>
  
    <div id="Block2" class="button">
      <a href="https://steamcommunity.com/groups/LowerLandRP" target="_blank" title="Группа steam">
    <img alt="Steam" src="photo/steam_logo.png"/>
    </a>
    </div>
  
    <div id="Block3" class="button">
      <a href="https://discord.gg/BsHqQ7e" target="_blank" title="Discord канал">
    <img alt="Discord" src="photo/discord_logo.png"/>
    </a>
    </div>
  
    <div id="Block4" class="button">
      <a href="https://vk.com/landproject.gmod" target="_blank" title="Группа VK">
    <img alt="VK" src="photo/vk_logo.png"/>
    </a>
    </div>


    <div id="forum1" class="button">
      <a href="http://donat.landproject.su/" title="Донат">Донат</a>
    </div>
  </div>
  
  <div id="Line1">
    
  </div>
  
  <div id="Block5">
      <div id="Text2">
        <p>Донат</p>
      </div>
  </div>

  <div id="Block66">
    <div id="Text4">
      <p>Пополнение донат счёта</p>
    </div>
    <div id="Text5">
      <p>Пример SteamID: STEAM_0:0:97719474</p>
    </div>
      <?
   if (!isset($_SESSION['steamid'])) {
    echo '
        <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">



<form method="GET" action=http://donat.landproject.su/sample/initPaymentForm.php >
        <div class="row">
  <br>';
 echo '</div> 
 <form>
    <div class="group" id="donat_line1">      
      <input type="text" name="amount" maxlength="7" required>
      <span class="bar"></span>
      <label>Сумма</label>
   </div>
   <div class="group" id="donat_line2">      
      <input type="text" name="account" maxlength="21" required>
      <span class="bar"></span>
      <label>SteamID</label>
   </div>
</form> 

   
   
  <!-- <a href="" id="donat_button1">Оплатить</a> -->



 <!--       <div class="input-field col s6"><br>Сумма
  <input type="text" name="amount" maxlength="7"></input><br><h1
  </div>   </div>   <div class="input-field col s6"><br>SteamID
  <input type="text" name="account" maxlength="21">
     </div> </div>
   </div>
  <div class="row"> <div class="row"> -->
  

  
 <button type="submit" id="donat_button1">Оплатить</button> 
  <br>
  </form>
  <br>
  <form method="GET" action="http://donat.landproject.su/sample/initPaymentForm.php" >     
    <input type="hidden" name="account" maxlength="5" value="test"></input>
    <input type="hidden" name="amount" maxlength="5" value="1"></input>
  </form> 
  
  </div> 

  </div> </div> 
';  
   }  
   ?>  
  <?
  if (isset($_SESSION['steamid'])) {
  echo '
        <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Донат</span>
              <p>После ввода кол-ва рублей нажмите на кнопку оплатить. Вы будете направлены на страницу оплаты. После оплаты Вы получите эквивалнтное кол-во на Ваш счет.





<form method="GET" action=http://donat.landproject.su/sample/initPaymentForm.php >     
        <div class="row">
<div id="don"><h5>Введите сколько рублей вы хотите задонатить</h5>1 рубль = 1 рубль [KIV]<br>';
 echo '</div> 
        <div class="input-field col s6">
  <input type="text" name="amount" maxlength="5"></input>
  <input type="hidden" name="account" maxlength="5" value="'.$steamid.'"></input> </div>   </div> </div>
  <div class="row"> <div class="row">
        <button class="btn waves-effect waves-light">оплатить
  </button>  <br>
  </form><br>
        <form method="GET" action=http://donat.landproject.su/sample/initPaymentForm.php >     
<input type="hidden" name="account" maxlength="5" value="test"></input>
<input type="hidden" name="amount" maxlength="5" value="1"></input>
      <button class="btn waves-effect waves-light">Тестовый платеж
  </button>   </form>
            </div>

          </div> </div> 
';  

}

?>   
</div>
</div>

<footer>
  <div id="footer1">
    <div id="Line2"></div>
  </div>
</footer>


</body>
</html>



