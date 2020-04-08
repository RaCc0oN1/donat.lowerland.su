<?php

/**
 *  Demo handler for your projects
 *
 * @link http://help.unitpay.ru/article/35-confirmation-payment
 */

require_once('../UnitPay.php');
$projectId  = 232601;
$secretKey  = '2e9f7b31d13c8544d6ae9e204449b0ab';
$publicId   = '232601-07b72';
$orderCurrency  = 'RUB';
$unitPay = new UnitPay($secretKey);

try {
    // Validate request (check ip address, signature and etc)
    $unitPay->checkHandlerRequest();

    list($method, $params) = array($_GET['method'], $_GET['params']);

    // Very important! Validate request with your order data, before complete order
    if (
        //$params['orderSum'] != $orderSum ||
        $params['orderCurrency'] != $orderCurrency ||
        //$params['account'] != $orderId ||
        $params['projectId'] != $projectId
    ) {
        // logging data and throw exception
        throw new InvalidArgumentException('Order validation Error!');
    }

    switch ($method) {
        // Just check order (check server status, check order in DB and etc)
        case 'check':
            print $unitPay->getSuccessHandlerResponse('Check Success. Ready to pay.');
            break;
        // Method Pay means that the money received
        case 'pay':
            // Please complete order
            print $unitPay->getSuccessHandlerResponse('Pay Success');
			$steamid = $params['account'];
			if ( $steamid == 'test' ) {
			break;
			}
$uniid = crc32('gm_'.$steamid.'_gm'); // полная пизда
$mysqli = new mysqli("localhost", "iluksa_mybb1", "BH&fY5c&", "iluksa_mybb1");

$res99 = $mysqli->query("SELECT `points` FROM `pointshop_data` WHERE `uniqueid` = ".$uniid);
$row99 = $res99->fetch_assoc();
$res91 = $params['orderSum'];
$res91 = $row99['points'] + $params['orderSum'];
$mysqli->real_query("UPDATE `pointshop_data` SET `points`= ".$res91." WHERE `uniqueid` = ".$uniid);
$mysqli->real_query("INSERT INTO pointshop_data ( uniqueid, points, items ) VALUES ( '".$uniid."', '".$res91."', '{}') ");

file_put_contents ( "dat.log" ,"DATE: [{$params['date']}] STEAMID_32: {$params['account']} UNIQUEID: {$uniid} BALANCE:{$row['rubl']} + {$summ}\n",FILE_APPEND);
            break;
        // Method Error means that an error has occurred.
        case 'error':
            // Please log error text.
            print $unitPay->getSuccessHandlerResponse('Error logged');
            break;
        // Method Refund means that the money returned to the client
        case 'refund':
            // Please cancel the order
            print $unitPay->getSuccessHandlerResponse('Order canceled');
            break;
    }
// Oops! Something went wrong.
} catch (Exception $e) {
    print $unitPay->getErrorHandlerResponse($e->getMessage());
}
