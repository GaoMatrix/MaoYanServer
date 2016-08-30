<?php
namespace Admin\Controller;
use Think\Controller\RestController;

class AppController extends RestController {

    Public function rest() {
     switch ($this->_method){
      case 'get': // get请求处理代码
           if ($this->_type == 'html'){
           }elseif($this->_type == 'xml'){
           }
           break;
      case 'put': // put请求处理代码
           break;
      case 'post': {
         	$app = M('App');
            if ($data = $app->create()) {
                if ($app->add($data)) {
                    $this->response('Success', 'json');
                } else {
                    $this->response('Fail', 'json');
                }
            } else {
                    $this->response('Data illeagl', 'json');
            }
            $this->response('Success', 'json');
            break;
        }
     }
   }
	
	public function read() {
        $app = M('App');
        if ($data = $app->create()) {
            if ($app->add($data)) {
                $this->response('Success', 'json');
            } else {
                $this->response('Fail', 'json');
            }
        } else {
                $this->response('Data illeagl', 'json');
        }
	}


	
	
    public function index(){
    	require 'conf.php';
    	// 简单推送示例
    	$push_payload = $client->push()
    	->setPlatform('all')
    	->addAllAudience()
    	->setNotificationAlert('Hi, JPush');
    	try {
    		$response = $push_payload->send();
    	}catch (\JPush\Exceptions\APIConnectionException $e) {
    		// try something here
    		print $e;
    	} catch (\JPush\Exceptions\APIRequestException $e) {
    		// try something here
    		print $e;
    	}
    	print_r($response);
    	
    	
    	// 完整的推送示例
    	try {
    		$response = $client->push()
    		->setPlatform(array('ios', 'android'))
    		->addAlias('alias')
    		->addTag(array('tag1', 'tag2'))
    		->addRegistrationId($registration_id)
    		->setNotificationAlert('Hi, JPush')
    		/* ->iosNotification('Hello IOS', array(
    				'sound' => 'hello jpush',
    				'badge' => 2,
    				'content-available' => true,
    				'category' => 'jiguang',
    				'extras' => array(
    						'key' => 'value',
    						'jiguang'
    				),
    		)) */
    		->androidNotification('Hello Android', array(
    				'title' => 'hello jpush',
    				'build_id' => 2,
    				'extras' => array(
    						'key' => 'value',
    						'jiguang'
    				),
    		))
    		->message('message content', array(
    				'title' => 'hello jpush',
    				'content_type' => 'text',
    				'extras' => array(
    						'key' => 'value',
    						'jiguang'
    				),
    		))
    		->options(array(
    				'sendno' => 100,
    				'time_to_live' => 100,
    				'apns_production' => false,
    				'big_push_duration' => 100
    		))
    		->send();
    	} catch (\JPush\Exceptions\APIConnectionException $e) {
    		// try something here
    		print $e;
    	} catch (\JPush\Exceptions\APIRequestException $e) {
    		// try something here
    		print $e;
    	}
    	
    	print_r($response);
    }
}