<?php

/**
 * Payment form
 *
 * @link http://help.unitpay.ru/article/31-creating-payment-from-payment-form
 */

require_once('../UnitPay.php');

$projectId  = 232601;
$secretKey  = '2e9f7b31d13c8544d6ae9e204449b0ab';
$publicId   = '232601-07b72';
$orderCurrency  = 'RUB';
$orderId = $_GET['account'];
$orderSum = $_GET['amount'];
$orderDesc      = 'Пополнение счета "'.$orderId.'" на '.$orderSum.'';

$unitPay = new UnitPay($secretKey);

$redirectUrl = $unitPay->form(
    $publicId,
    $orderSum,
    $orderId,
    $orderDesc,
    $orderCurrency
);

header("Location: " . $redirectUrl);
