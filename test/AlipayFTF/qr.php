<?php
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayFTF\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayFTF\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayFTF\Params\QR\Request;
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url']; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->businessParams->total_amount = 0.01; // 价格
$request->businessParams->subject = '小米手机9黑色陶瓷尊享版';

// 调用接口
$data = $pay->execute($request);
var_dump($data);
?>
<img src="http://qr.liantu.com/api.php?text=<?php echo urlencode($data['alipay_trade_precreate_response']['qr_code']);?>"/>
