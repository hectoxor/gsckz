<?php

App::uses('CakeEmail', 'Network/Email');

class RequestsController extends AppController {

	// public $uses = array('Request', 'Banner');
	public function beforeFilter(){
		parent::beforeFilter();
	}
	public $helpers = array('Html', 'Form', 'Session');

	public function admin_index(){
		$data = $this->Request->find('all', array('order' => array('Request.id' => 'desc')));
		
		$this->set(compact('data'));
	}

	public function index(){
		if(!empty($this->request->data)){
			$data = $this->request->data;
			// $this->Request->create();
			$email = new CakeEmail('smtp');
			// debug($data);die;
			$email->from(array('no-reply@gscstudy.kz' => 'gscstudy.kz'))
			->to('kamilya@gscenter.kz')
			// ->to('')
			->subject('Новые письмо с сайта');
			
			$message = 'Имя: ' . $data['name'] . ', Телефон: ' . $data['phone'];
			
			
			if( $email->send($message) ){
			// if( $this->Request->save($data) ){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
				return $this->redirect('http://gscstudy.kz?status=1');
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				return $this->redirect('http://gscstudy.kz?status=2');
			}
		}
	}

	public function send(){
		if(!empty($this->request->data)){
			$data = $this->request->data;

			// $this->Request->create();
			// $r1 = $data['r1'];
			// $r2 = $data['r2'];
			// $r_sum = $r1 + $r2;
			// if(isset($data['robot']) && $data['robot'] == $r_sum){

			if( isset($data['g-recaptcha-response']) && $data['g-recaptcha-response'] ){
		        // $toSend = json_encode(array(
		        //     "fullName" =>   isset($data['name']) ? $data['name'] : "",
		        //     "phone" =>      isset($data['phone']) ? $data['phone'] : "",
		        //     "type"=>        isset($_POST['page']) ? $_POST['page']: "",
		        //     "email"=>       isset($data['mail']) ? $data['mail']: "",
		        //     "office"=>      isset($data['city']) ? ($data['city']): "",
		        //     "description"=> isset($data['question']) ? ($data['question']): "",
		        //     "roistat"=>     isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : "",
		        //     "utm_source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "", // UTM-метка «Рекламная система»
		        //     "utm_medium" => isset($_COOKIE['medium']) ? $_COOKIE['medium'] : "" ,// UTM-метка «Тип трафика»
		        //     "utm_campaign"=>isset($_COOKIE['campaign']) ? $_COOKIE['campaign'] : "", // UTM-метка «Обозначение рекламной кампании»
		        //     "utm_term"=>    isset($_COOKIE['term']) ? $_COOKIE['term'] : "",// UTM-метка «Условие поиска кампании»
		        //     "utm_content"=> isset($_COOKIE['content']) ? $_COOKIE['content'] : "", // UTM-метка «Содержание кампании»
		        // ));

		        // $ch = curl_init("https://gscastana.t8s.ru/Api/V2/AddStudyRequest");
		        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		        // if(isset($data['url'])){
		        //         curl_setopt($ch, CURLOPT_REFERER, strip_tags($data['url']));
		        //     }
		        // curl_setopt($ch, CURLOPT_POSTFIELDS, $toSend);
		        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
		        // curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		        // $result = curl_exec($ch);
		        // curl_close($ch);

		        /*------------ Auth Token ----------*/

		        $ch      = curl_init();
		        $api_data    = ['email' => 'fabdykhalykova@gmail.com', 'api_key' => '26d9e74a-b3dc-11eb-9aef-ac1f6b4782be'];

		        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
		        curl_setopt($ch, CURLOPT_URL, 'https://gscstudy.s20.online/v2api/auth/login');
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($api_data));
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		        $result = json_decode(curl_exec($ch), true);
		        $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		        if (curl_errno($ch))
		            throw new \Exception('Curl error');

		        curl_close($ch);

		        if ($code !== 200)
		            throw new \Exception($result['name'] . ' - ' . $result['message']);

		        $token = $result['token'];

		        /*------------ Auth Token END ----------*/

		        /*------------ Alfa CRM BEGIN ----------*/

			        if( $data['page'] == 'diplomat' ){

			        	// GSC Diplomat 
			        	$crm_branch_id = 4;

				        $name = isset($data['name']) ? $data['name'] : '';
				        $phone = isset($data['phone']) ? $data['phone'] : '';
				        $note = isset($data['note']) ? $data['note'] : '';

				        $ch = curl_init();

				        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-ALFACRM-TOKEN: '.$token, 'Accept: application/json', 'Content-Type: application/json']);
				        curl_setopt($ch, CURLOPT_URL, 'https://gscstudy.s20.online/v2api/'.$crm_branch_id.'/customer/create');
				        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
				        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"name":"'.$name.'", "phone":"'.$phone.'", "note":"'.$note.'", "custom_edu_type":"'.$custom_edu_type.'", "branch_ids":"'.$crm_branch_id.'", "legal_type":"1", "is_study":"0", "lead_source_id":"3"}');
				        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				        $result = json_decode(curl_exec($ch), true);
				        $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

				        if (curl_errno($ch))
				            throw new \Exception('Curl error');

				        curl_close($ch);
			        }

		        /*------------ Alfa CRM END ----------*/

		        /*------------ Bitrix24 BEGIN ----------*/

			        if( $data['page'] == 'b24' ){

			        	if( isset($data['custom_edu_type']) && $data['custom_edu_type'] ){
			        		$data['note'] = $data['custom_edu_type'] ."<br>\n". $data['note'];
			        	}

			        	$b24_email = Array();
			        	if( isset($data['mail']) && $data['mail'] ){
			        		$b24_email = Array(
			        			0 => Array(
			        				'VALUE' => $data['mail'],
			        				"VALUE_TYPE" => "WORK",
			        			),
			        		);
			        	}

			        	// формируем URL в переменной $queryUrl
			        	$queryUrl = 'https://gscstudy.bitrix24.ru/rest/12/yabru6u9indvcfk0/crm.lead.add.json';

			        	// формируем параметры для создания лида в переменной $queryData
			        	$queryData = http_build_query(array(
			        	  'fields' => array(
			        	    'TITLE' => 'Заявка с gscstudy.kz',
			        	    'NAME' => $data['name'],
			        	    'COMMENTS' => $data['city'] . "\n\n" . $data['note'],
			        		'PHONE' => Array(
			        		    0 => Array(
			        		        "VALUE" => $data['phone'],
			        		        "VALUE_TYPE" => "WORK",
			        		    ),
			        		),
			        		'EMAIL' => $b24_email,
			        		'ADDRESS' => $data['city'],
			        		'SOURCE_ID' => 'WEBFORM',
			        	  ),
			        	  'params' => array("REGISTER_SONET_EVENT" => "Y")
			        	));

			        	// обращаемся к Битрикс24 при помощи функции curl_exec
			        	$curl = curl_init();
			        	curl_setopt_array($curl, array(
			        	  CURLOPT_SSL_VERIFYPEER => 0,
			        	  CURLOPT_POST => 1,
			        	  CURLOPT_HEADER => 0,
			        	  CURLOPT_RETURNTRANSFER => 1,
			        	  CURLOPT_URL => $queryUrl,
			        	  CURLOPT_POSTFIELDS => $queryData,
			        	));
			        	$result = curl_exec($curl);
			        	curl_close($curl);
			        	$result = json_decode($result, 1);
			        	if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br/>";
			        }

		        /*------------ Bitrix24 END ----------*/

				
				$email = new CakeEmail('smtp');
				$send_email = 'info@gscenter.kz';
				if($data['city'] == 'Нур-Султан'){
					$send_email = 'kamilya@gscenter.kz';
					// $send_email = ''venera.bai@gscenter.kz;
					
					// $ch = curl_init();
					// 	curl_setopt($ch, CURLOPT_URL, "https://gscstudy.s20.online/api/1/lead/create?token=c4ca4238a0b923820dcc509a6f75849b");
					// 	curl_setopt($ch, CURLOPT_POST, true);
					// 	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
					// 		"name" =>   isset($data['name']) ? $data['name'] : "",
					// 		"phone" =>      isset($data['phone']) ? $data['phone'] : "",
					// 		"email"=>       isset($data['mail']) ? $data['mail']: "",
					// 		"office"=>      isset($data['city']) ? ($data['city']): "",
					// 		"birthday"=>    isset($data['date']) ? ($data['date']): "",
					// 		"note"=>       isset($description) ? ($description): "",
					// 		"source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "",
					// 	]));
						
					// 	$result = curl_exec($ch);
					// 	curl_close($ch);

					/*--------- Old Method API-------*/


					/*--------- New Method API -------*/

					// $name = isset($data['name']) ? $data['name'] : '';
					// $phone = isset($data['phone']) ? $data['phone'] : '';
					// $note = isset($data['note']) ? $data['note'] : '';
					// $custom_edu_type = isset($data['custom_edu_type']) ? $data['custom_edu_type'] : '';

					// $ch = curl_init();

					// curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-ALFACRM-TOKEN: '.$token, 'Accept: application/json', 'Content-Type: application/json']);
					// curl_setopt($ch, CURLOPT_URL, 'https://gscstudy.s20.online/v2api/3/customer/create');
					// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
					// curl_setopt($ch, CURLOPT_POSTFIELDS, '{"name":"'.$name.'", "phone":"'.$phone.'", "note":"'.$note.'", "custom_edu_type":"'.$custom_edu_type.'", "branch_ids":"3", "legal_type":"1", "is_study":"0", "lead_source_id":"3"}');
					// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					// $result = json_decode(curl_exec($ch), true);
					// $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

					// if (curl_errno($ch))
					//     throw new \Exception('Curl error');

					// curl_close($ch);

					/*--------- New Method API END -------*/

				}
				if($data['city'] == 'Алматы'){
					$send_email = 'dilshat@gsc.kz';
						// $ch = curl_init();
						// curl_setopt($ch, CURLOPT_URL, "https://gscstudy.s20.online/api/1/lead/create?token=c4ca4238a0b923820dcc509a6f75849b");
						// curl_setopt($ch, CURLOPT_POST, true);
						// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
						// 	"name" =>   isset($data['name']) ? $data['name'] : "",
						// 	"phone" =>      isset($data['phone']) ? $data['phone'] : "",
						// 	"email"=>       isset($data['mail']) ? $data['mail']: "",
						// 	"office"=>      isset($data['city']) ? ($data['city']): "",
						// 	"birthday"=>    isset($data['date']) ? ($data['date']): "",
						// 	"note"=>       isset($description) ? ($description): "",
						// 	"source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "",
						// ]));
						
						// $result = curl_exec($ch);
						// curl_close($ch);

					/*--------- New Method API -------*/

					// $name = isset($data['name']) ? $data['name'] : '';
					// $phone = isset($data['phone']) ? $data['phone'] : '';
					// $note = isset($data['note']) ? $data['note'] : '';

					// $ch = curl_init();

					// curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-ALFACRM-TOKEN: '.$token, 'Accept: application/json', 'Content-Type: application/json']);
					// curl_setopt($ch, CURLOPT_URL, 'https://gscstudy.s20.online/v2api/1/customer/create');
					// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
					// curl_setopt($ch, CURLOPT_POSTFIELDS, '{"name":"'.$name.'", "phone":"'.$phone.'", "note":"'.$note.'", "custom_edu_type":"'.$custom_edu_type.'", "branch_ids":"1", "legal_type":"1", "is_study":"0", "lead_source_id":"3"}');
					// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					// $result = json_decode(curl_exec($ch), true);
					// $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

					// if (curl_errno($ch))
					//     throw new \Exception('Curl error');

					// curl_close($ch);

					/*--------- New Method API END -------*/
				}
				if($data['city'] == 'Актау'){
					$send_email = 'dilshat@gsc.kz';
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, "https://gscstudy.s20.online/api/1/lead/create?token=c4ca4238a0b923820dcc509a6f75849b");
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
							"name" =>   isset($data['name']) ? $data['name'] : "",
							"phone" =>      isset($data['phone']) ? $data['phone'] : "",
							"email"=>       isset($data['mail']) ? $data['mail']: "",
							"office"=>      isset($data['city']) ? ($data['city']): "",
							"birthday"=>    isset($data['date']) ? ($data['date']): "",
							"note"=>       isset($description) ? ($description): "",
							"source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "",
						]));
						
						$result = curl_exec($ch);
						curl_close($ch);
				}
				if($data['city'] == 'Караганда'){
					$send_email = 'alibek@gscstudy.kz';
				}
				if($data['city'] == 'Павлодар'){
					$send_email = 'alibek@gscstudy.kz';
				}			
				$email->from(array('no-reply@gscstudy.kz' => 'gscstudy.kz'))
				// ->to($send_email)
				->to('testy@gscstudy.kz')
				->subject('Новая заявка с сайта');
				
				$message = 'Страница: ' . $data['page'] . ', Имя: ' . $data['name'] . ', Телефон: ' . $data['phone'];

				if( isset($data['mail']) && $data['mail'] ){
					$message .= ', E-mail: ' . $data['mail'];
				}
				if( isset($data['question']) && $data['question'] ){
					$message .= ', Вопрос: ' . $data['question'];
				}
				
				if( $email->send($message) ){
					$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
					return $this->redirect($this->referer());
				}
				
			} else{
				$this->Session->setFlash('Ошибка! Поставьте галочку что вы не робот', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
			
			// $this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
			// return $this->redirect($this->referer());
		}
	}

	public function sendAbroad(){
		if(!empty($this->request->data)){
			$data = $this->request->data;
	
			// $this->Request->create();
			// $r1 = $data['r1'];
			// $r2 = $data['r2'];
			// $r_sum = $r1 + $r2;
			// if(isset($data['robot']) && $data['robot'] == $r_sum){

			if( isset($data['g-recaptcha-response']) && $data['g-recaptcha-response'] ){
				
				$toSend = json_encode(array(
		            "fullName" =>   isset($data['name']) ? $data['name'] : "",
		            "phone" =>      isset($data['phone']) ? $data['phone'] : "",
		            "type"=>        isset($_POST['page']) ? $_POST['page']: "",
		            "email"=>       isset($data['mail']) ? $data['mail']: "",
		            "office"=>      isset($data['city']) ? ($data['city']): "",
		            "description"=> isset($data['question']) ? ($data['question']): "",
		            "roistat"=>     isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : "",
		            "utm_source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "", // UTM-метка «Рекламная система»
		            "utm_medium" => isset($_COOKIE['medium']) ? $_COOKIE['medium'] : "" ,// UTM-метка «Тип трафика»
		            "utm_campaign"=>isset($_COOKIE['campaign']) ? $_COOKIE['campaign'] : "", // UTM-метка «Обозначение рекламной кампании»
		            "utm_term"=>    isset($_COOKIE['term']) ? $_COOKIE['term'] : "",// UTM-метка «Условие поиска кампании»
		            "utm_content"=> isset($_COOKIE['content']) ? $_COOKIE['content'] : "", // UTM-метка «Содержание кампании»
		        ));

		        $ch = curl_init("https://gscastana.t8s.ru/Api/V2/AddStudyRequest");
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		        if(isset($data['url'])){
		                curl_setopt($ch, CURLOPT_REFERER, strip_tags($data['url']));
		            }
		        curl_setopt($ch, CURLOPT_POSTFIELDS, $toSend);
		        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
		        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		        $result = curl_exec($ch);
		        curl_close($ch);

				$email = new CakeEmail('smtp');
				$send_email = 'info@gscenter.kz';
				if($data['city'] == 'Нур-Султан'){
					$send_email = 'kamilya@gscenter.kz';
					// $send_email = ''venera.bai@gscenter.kz;
				}
				if($data['city'] == 'Алматы'){
					$send_email = 'kamilya@gscenter.kz';
				}
				if($data['city'] == 'Актау'){
					$send_email = 'kamilya@gscenter.kz';
				}
				if($data['city'] == 'Караганда'){
					$send_email = 'alibek@gscstudy.kz';
				}
				if($data['city'] == 'Павлодар'){
					$send_email = 'kamilya@gscenter.kz';
				}			
				$email->from(array('no-reply@gscstudy.kz' => 'gscstudy.kz'))
				->to($send_email)
				// ->to('')
				->subject('Новые письмо с сайта');
				
				$message = 'Страница: ' . $data['page'] . ', Имя: ' . $data['name'] . ', Телефон: ' . $data['phone'] . ', E-mail: ' . $data['mail'];
				
				if( $email->send($message) ){
				// if( $this->Request->save($data) ){
					$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
					return $this->redirect($this->referer());
				}
			}else{
				$this->Session->setFlash('Проверочный код введен неверно', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
	}

	public function admin_delete($id){
		if (!$this->Request->exists($id)) {
			throw new NotFounddException('Такой заявки нет');
		}
		if($this->Request->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function test(){
		// $te = 'info@astanacreative.kz';

		$my_err_msg = [];

		if(!empty($this->request->data)){
			$data = $this->request->data;

			if( isset($data['g-recaptcha-response']) && $data['g-recaptcha-response'] ){
				// $this->Request->create();
				// $r1 = $data['r1'];
				// $r2 = $data['r2'];
				// $r_sum = $r1 + $r2;
				// if(isset($data['robot']) && $data['robot'] == $r_sum){
				$senddata = strip_tags($data['senddata']);
				$test_result = $this->_checkAnswers($senddata);
				$description = "Тест: ".$test_result."  .". "\n\n" .'Откуда вы узнали о нас: '.$data['question_about'].".\n В какое время вам удобно заниматься: ".$data['question_time'] . "\n\n";
				if($data['city'] != 'Алматы'){
					$birthday = date("YYYY-MM-DD", strtotime($data['date']));
					// $description = "Тест: ".strip_tags($data['senddata']).'  .'.'Откуда вы узнали о нас: '.$data['question_about'].'. В какое время вам удобно заниматься: '.$data['question_time'];
					// $toSend = json_encode(array(
					// 	"fullName" =>   isset($data['name']) ? $data['name'] : "",
					// 	"phone" =>      isset($data['phone']) ? $data['phone'] : "",
					// 	"type"=>        isset($_POST['page']) ? $_POST['page']: "",
					// 	"email"=>       isset($data['mail']) ? $data['mail']: "",
					// 	"office"=>      isset($data['city']) ? ($data['city']): "",
					// 	"birthday"=>    isset($data['date']) ? ($data['date']): "",
					// 	 "description"=> isset($description) ? ($description): "",
					// 	"roistat"=>     isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : "",
					// 	"utm_source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "", // UTM-метка «Рекламная система»
					// 	"utm_medium" => isset($_COOKIE['medium']) ? $_COOKIE['medium'] : "" ,// UTM-метка «Тип трафика»
					// 	"utm_campaign"=>isset($_COOKIE['campaign']) ? $_COOKIE['campaign'] : "", // UTM-метка «Обозначение рекламной кампании»
					// 	"utm_term"=>    isset($_COOKIE['term']) ? $_COOKIE['term'] : "",// UTM-метка «Условие поиска кампании»
					// 	"utm_content"=> isset($_COOKIE['content']) ? $_COOKIE['content'] : "", // UTM-метка «Содержание кампании»
	    		    //   ));
					// $ch = curl_init("https://gscastana.t8s.ru/Api/V2/AddStudyRequest");
					// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					// if(isset($data['url'])){
					// 		curl_setopt($ch, CURLOPT_REFERER, strip_tags($data['url']));
					// 	}
					// curl_setopt($ch, CURLOPT_POSTFIELDS, $toSend);
					// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
					// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
					// curl_setopt($ch, CURLOPT_TIMEOUT, 5);
					// $result = curl_exec($ch);
					// curl_close($ch);
				}

		        /*------------ Auth Token ----------*/
			        $ch      = curl_init();
			        $api_data    = ['email' => 'fabdykhalykova@gmail.com', 'api_key' => '26d9e74a-b3dc-11eb-9aef-ac1f6b4782be'];

			        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
			        curl_setopt($ch, CURLOPT_URL, 'https://gscstudy.s20.online/v2api/auth/login');
			        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($api_data));
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			        $result = json_decode(curl_exec($ch), true);
			        $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			        if (curl_errno($ch))
			            throw new \Exception('Curl error');
			        curl_close($ch);

			        if ($code !== 200)
			            throw new \Exception($result['name'] . ' - ' . $result['message']);

			        $token = $result['token'];

			        $my_err_msg['auth_result'] = $result;
			        $my_err_msg['token_auth'] = $token;

		        /*------------ Auth Token END ----------*/


		        /*------------ Alfa CRM BEGIN ----------*/
		        
		        	$crm_branch_id = 3;
			        if( $data['city'] == 'Алматы' ){
			        	$crm_branch_id = 1;

			        } elseif( $data['city'] == 'Астана' ){
			        	$crm_branch_id = 3;

			        } else{
			        	$crm_branch_id = 3;
			        }

			        if( $crm_branch_id ){
				        $name = isset($data['name']) ? $data['name'] : '';
				        $phone = isset($data['phone']) ? $data['phone'] : '';
				        $note = $description;

				        $my_data = [
				        	'name' => $name,
				        	'phone' => $phone,
				        	'note' => $note,
				        	'custom_edu_type' => $custom_edu_type,
				        	'branch_ids' => $crm_branch_id,
				        	'legal_type' => 1,
				        	'is_study' => 0,
				        	'lead_source_id' => 3,
				        ];

				        $ch = curl_init();
				        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-ALFACRM-TOKEN: '.$token, 'Accept: application/json', 'Content-Type: application/json']);
				        curl_setopt($ch, CURLOPT_URL, 'https://gscstudy.s20.online/v2api/'.$crm_branch_id.'/customer/create');
				        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
				        // curl_setopt($ch, CURLOPT_POSTFIELDS, '{"name":"'.$name.'", "phone":"'.$phone.'", "note":"'.$note.'", "custom_edu_type":"'.$custom_edu_type.'", "branch_ids":"'.$crm_branch_id.'", "legal_type":"1", "is_study":"0", "lead_source_id":"3"}');

				        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($my_data));

				        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				        $result = json_decode(curl_exec($ch), true);
				        $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				        if (curl_errno($ch))
				            throw new \Exception('Curl error');
				        curl_close($ch);

				        $my_err_msg['crm_result'] = $result;
			        }

		        /*------------ Alfa CRM END ----------*/

		  //       $total_logs = json_encode($my_err_msg);
				
				
				// $debug_email = new CakeEmail('smtp');
				// $debug_email->from(array('no-reply@gscstudy.kz' => 'no-reply@gscstudy.kz'))
				// ->to('jas_98kz@mail.ru')
				// ->subject('GSC Debug');
				// $debug_email->viewVars(array('content' => $total_logs));
				// $debug_email->template('welcome','default');
				// $debug_email->emailFormat('html');
				// $debug_email->send($total_logs);



				// debug($data);die;
				$send_email = 'info@gscenter.kz';
				if($data['city'] == 'Нур-Султан' || $data['city'] == 'Астана'){
					$send_email = 'alibek@gscstudy.kz'; 
					
					// $send_email = 'venera.bai@gscenter.kz';
				}
				if($data['city'] == 'Алматы'){
					// $send_email = 'dilshat@gsc.kz';
					$send_email = 'alibek@gscstudy.kz';
						// $ch = curl_init();
						// curl_setopt($ch, CURLOPT_URL, "https://gscstudy.s20.online/api/1/lead/create?token=c4ca4238a0b923820dcc509a6f75849b");
						// curl_setopt($ch, CURLOPT_POST, true);
						// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
						// 	"name" =>   isset($data['name']) ? $data['name'] : "",
						// 	"phone" =>      isset($data['phone']) ? $data['phone'] : "",
						// 	"email"=>       isset($data['mail']) ? $data['mail']: "",
						// 	"office"=>      isset($data['city']) ? ($data['city']): "",
						// 	"birthday"=>    isset($data['date']) ? ($data['date']): "",
						// 	"note"=>       isset($description) ? ($description): "",
						// 	"source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "",
						// ]));
						
						// $result = curl_exec($ch);
						// curl_close($ch);
				}
				if($data['city'] == 'Актау'){
					// $send_email = 'dilshat@gsc.kz';
					$send_email = 'alibek@gscstudy.kz';
						// $ch = curl_init();
						// curl_setopt($ch, CURLOPT_URL, "https://gscstudy.s20.online/api/1/lead/create?token=c4ca4238a0b923820dcc509a6f75849b");
						// curl_setopt($ch, CURLOPT_POST, true);
						// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
						// 	"name" =>   isset($data['name']) ? $data['name'] : "",
						// 	"phone" =>      isset($data['phone']) ? $data['phone'] : "",
						// 	"email"=>       isset($data['mail']) ? $data['mail']: "",
						// 	"office"=>      isset($data['city']) ? ($data['city']): "",
						// 	"birthday"=>    isset($data['date']) ? ($data['date']): "",
						// 	"note"=>       isset($description) ? ($description): "",
						// 	"source" => isset($_COOKIE['source']) ? $_COOKIE['source'] : "",
						// ]));
						
						// $result = curl_exec($ch);
						// curl_close($ch);
				}
				if($data['city'] == 'Караганда'){
					$send_email = 'alibek@gscstudy.kz';
				}
				if($data['city'] == 'Павлодар'){
					$send_email = 'alibek@gscstudy.kz';
				}
				if($data['city'] == 'Другой город'){
					$send_email = 'alibek@gscstudy.kz';
				}


				$send_email = 'testy@gscstudy.kz';

				$email = new CakeEmail('smtp');
				$email->from(array('no-reply@gscstudy.kz' => 'no-reply@gscstudy.kz'))
				->to($send_email)
				->subject('Результаты Теста с сайта gscstudy.kz');
				$message = '<strong>Тест: </strong> '. $test_result . '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Почта:</b> ' . $data['email'] . '</p><p><b>Телефон:</b> ' . $data['phone'] . '</p><b>Город:</b> ' . $data['city'] . '</p><p><b>Дата рождения:</b> ' . $data['date'] . '</p><p><b>Откуда вы узнали о нас</b> ' . $data['question_about']. '</p><p><b>В какое время вам удобно заниматься</b> ' . $data['question_time'];
				$email->viewVars(array('content' => $message));
				$email->template('welcome','default');
				$email->emailFormat('html');

				// $email->send($message);

				if( $email->send($message) ){
					$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
					return $this->redirect($this->referer());
				}

				// $this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
				// return $this->redirect($this->referer());

			} else{
				$this->Session->setFlash('Ошибка! Поставьте галочку что вы не робот', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}



				// }else{
				// 	$this->Session->setFlash('Проверочный код введен неверно', 'default', array(), 'bad');
				// 	return $this->redirect($this->referer());
				// }

			// } else{
			// 	$this->Session->setFlash('Поставьте галочку что вы не робот', 'default', array(), 'bad');
			// 	return $this->redirect($this->referer());
			// }
			
		}
	}

	protected function _checkAnswers($senddata){

		$result = '';
		$test_answers = json_decode($senddata, true);

		if( $test_answers['test_name'] == 'General' ){
			$result = $this->_checkGeneral($test_answers['answers']);

		} elseif( $test_answers['test_name'] == 'Teen2' ){
			$result = $this->_checkTeen_2($test_answers['answers']);

		} elseif( $test_answers['test_name'] == 'Teen' ){
			$result = $this->_checkTeen($test_answers['answers']);

		} elseif( $test_answers['test_name'] == 'Kids' ){
			$result = $this->_checkKids($test_answers['answers']);

		} elseif( $test_answers['test_name'] == 'Ielts' ){
			$result = $this->_checkIelts($test_answers['answers']);

		}

		if( $result ){
			return $result;
		} else{
			return $senddata;
		}

		return false;
	}

	protected function _checkGeneral($general_answers){
		$general_data = "\nAdults English (14+) (General Test)\n\n";

		$total_grammar = 0;
		$total_reading = 0;
		$total_listening = 0;
		$total_writing = '';

		$general_grammar = [
			'questionq1' => 'q1a3', // c
			'questionq2' => 'q2a4', // d
			'questionq3' => 'q3a2', // b
			'questionq4' => 'q4a4', // d
			'questionq5' => 'q5a3', // c
			'questionq6' => 'q6a2', // b 
			'questionq7' => 'q7a3', // c
			'questionq8' => 'q8a1', // a
			'questionq9' => 'q9a2', // b 
			'questionq10' => 'q10a4', // d
			'questionq11' => 'q11a1', // a
			'questionq12' => 'q12a2', // b
			'questionq13' => 'q13a2', // b
			'questionq14' => 'q14a4', // d
			'questionq15' => 'q15a2', // b
			'questionq16' => 'q16a3', // c
			'questionq17' => 'q17a4', // d
			'questionq18' => 'q18a2', // b
			'questionq19' => 'q19a4', // d
			'questionq20' => 'q20a1', // a
			'questionq21' => 'q21a2', // b
			'questionq22' => 'q22a3', // c
			'questionq23' => 'q23a4', // d 
			'questionq24' => 'q24a1', // a
			'questionq25' => 'q25a4', // d
			'questionq26' => 'q26a3', // c
			'questionq27' => 'q27a1', // a 
			'questionq28' => 'q28a3', // c
			'questionq29' => 'q29a3', // c
			'questionq30' => 'q30a3', // c
			'questionq31' => 'q31a4', // d
			'questionq32' => 'q32a2', // b
			'questionq33' => 'q33a1', // a
			'questionq34' => 'q34a1', // a
			'questionq35' => 'q35a4', // d
			'questionq36' => 'q36a2', // b
			'questionq37' => 'q37a4', // d
			'questionq38' => 'q38a4', // d
			'questionq39' => 'q39a4', // d
			'questionq40' => 'q40a3', // c
		];

		$general_reading = [
			'questionr1' => 'r1a2', // false 
			'questionr2' => 'r2a1', // true
			'questionr3' => 'r3a2', // false
			'questionr4' => 'r4a1', // true
			'questionr5' => 'r5a1', // true
			'questionr6' => 'r6a2', // false
		];

		$general_listening = [
			'questionl1' => 'l1a2', // b
			'questionl2' => 'l2a1', // a
			'questionl3' => 'l3a2', // b
			'questionl4' => 'l4a3', // c
			'questionl5' => 'l5a1', // a
			'questionl6' => 'l6a3', // c
		];

		if( $general_answers['grammar'] ){
			foreach( $general_answers['grammar'] as $q_key => $a_key ){
				if( isset($general_grammar[$q_key]) ){
					if( $a_key == $general_grammar[$q_key] ){
						$total_grammar++;
					}
				} else{
					$general_data .= 'Grammar undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Grammar: ' . $total_grammar .'/'. count($general_grammar) . "\n";
		}

		if( $general_answers['reading'] ){
			foreach( $general_answers['reading'] as $q_key => $a_key ){
				if( isset($general_reading[$q_key]) ){
					if( $a_key == $general_reading[$q_key] ){
						$total_reading++;
					}
				} else{
					$general_data .= 'Reading undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Reading: ' . $total_reading .'/'. count($general_reading) . "\n";
		}

		if( $general_answers['listening'] ){
			foreach( $general_answers['listening'] as $q_key => $a_key ){
				if( isset($general_listening[$q_key]) ){
					if( $a_key == $general_listening[$q_key] ){
						$total_listening++;
					}
				} else{
					$general_data .= 'Listening undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Listening: ' . $total_listening .'/'. count($general_listening) . "\n";
		}

		if( $general_answers['writing'] ){
			$w_count = 1;
			foreach( $general_answers['writing'] as $a_writing ){
				$total_writing .= 'General Writing '.$w_count.":" . "\n";
				$total_writing .= '' . $a_writing . "\n\n";
				$w_count++;
			}

			$general_data .= 'Total Writing:' . "\n". $total_writing . "\n";
		}

		return $general_data;
	}

	protected function _checkTeen_2($general_answers){
		$general_data = 'English for teens (13-17 years) (Teen 2 Test)' . "\n\n";

		$total_grammar = 0;
		$total_reading = 0;
		$total_listening = 0;
		$total_writing = '';

		$general_grammar = [
			'questionq1' => 'q1a1',
			'questionq2' => 'q2a2',
			'questionq3' => 'q3a1',
			'questionq4' => 'q4a3',
			'questionq5' => 'q5a3',
			'questionq6' => 'q6a1',
			'questionq7' => 'q7a3',
			'questionq8' => 'q8a2',
			'questionq9' => 'q9a3',
			'questionq10' => 'q10a2',
			'questionq11' => 'q11a2',
			'questionq12' => 'q12a1',
			'questionq13' => 'q13a3',
			'questionq14' => 'q14a1',
			'questionq15' => 'q15a3',
		];

		$general_reading = [
			'questionr1' => 'r1a1',
			'questionr2' => 'r2a2',
			'questionr3' => 'r3a2',
			'questionr4' => 'r4a1',
			'questionr5' => 'r5a2',
			'questionr6' => 'r6a2',
			'questionr7' => 'r7a1',
			'questionr8' => 'r8a2',
		];

		$general_listening = [
			'questionl1' => 'l1a3',
			'questionl2' => 'l2a1',
			'questionl3' => 'l3a5',
			'questionl4' => 'l4a2',
			'questionl5' => 'l5a4',
			'questionl6' => 'l6a2', // 1
			'questionl7' => 'l7a1',
			'questionl8' => 'l8a2',
			'questionl9' => 'l9a1',
			'questionl10' => 'l10a1',
			'questionl11' => 'l11a2',
			'questionl12' => 'l12a2',
			'questionl13' => 'l13a2',
		];

		if( $general_answers['grammar'] ){
			foreach( $general_answers['grammar'] as $q_key => $a_key ){
				if( isset($general_grammar[$q_key]) ){
					if( $a_key == $general_grammar[$q_key] ){
						$total_grammar++;
					}

				} elseif( (mb_substr($q_key, 0, 2)) == 'tx' ){
					$general_data .= 'Grammar text answer: ' . $q_key .' - '. $a_key . "\n";

				} else{
					$general_data .= 'Grammar undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Grammar: ' . $total_grammar .'/'. count($general_grammar) . "\n";
		}

		if( $general_answers['reading'] ){
			foreach( $general_answers['reading'] as $q_key => $a_key ){
				if( isset($general_reading[$q_key]) ){
					if( $a_key == $general_reading[$q_key] ){
						$total_reading++;
					}
				} else{
					$general_data .= 'Reading undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Reading: ' . $total_reading .'/'. count($general_reading) . "\n";
		}

		if( $general_answers['listening'] ){
			foreach( $general_answers['listening'] as $q_key => $a_key ){
				if( isset($general_listening[$q_key]) ){
					if( $a_key == $general_listening[$q_key] ){
						$total_listening++;
					}
				} else{
					$general_data .= 'Listening undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Listening: ' . $total_listening .'/'. count($general_listening) . "\n";
		}

		if( $general_answers['writing'] ){
			$w_count = 1;
			foreach( $general_answers['writing'] as $a_writing ){
				$total_writing .= 'Writing '.$w_count.":\n";
				$total_writing .= '' . $a_writing . "\n\n";
				$w_count++;
			}

			$general_data .= 'Total Writing: ' . "\n" . $total_writing . "\n";
		}

		return $general_data;
	}

	protected function _checkTeen($general_answers){
		$general_data = 'English for teens (10-12 years) (Teen Test)' . "\n\n";

		$total_grammar = 0;
		$total_vocabulary = 0;
		$total_reading = 0;
		$total_listening = 0;
		$total_writing = '';

		$general_grammar = [
			'questionq1' => 'q1a2', // b 
			'questionq2' => 'q2a2', // b 
			'questionq3' => 'q3a2', // b
			'questionq4' => 'q4a2', // b
			'questionq5' => 'q5a1', // a 
			'questionq6' => 'q6a2', // b
			'questionq7' => 'q7a1', // a
			'questionq8' => 'q8a1', // a
			'questionq9' => 'q9a1', // a
			'questionq10' => 'q10a2', // b
			'questionq11' => 'q11a3', // c
			'questionq12' => 'q12a3', // c 
			'questionq13' => 'q13a2', // b
			'questionq14' => 'q14a2', // b
			'questionq15' => 'q15a1', // a
			'questionq16' => 'q16a1', // a
			'questionq17' => 'q17a1', // a
			'questionq18' => 'q18a1', // a 
			'questionq19' => 'q19a2', // b
			'questionq20' => 'q20a1', // a
		];

		$general_vocabulary = [
			'questionv1' => 'q1a2', 
			'questionv2' => 'q2a2', 
			'questionv3' => 'q3a2', 
			'questionv4' => 'q4a2', 
			'questionv5' => 'q5a1', 
			'questionv6' => 'q6a2', 
			'questionv7' => 'q7a1', 
			'questionv8' => 'q8a1', 
			'questionv9' => 'q9a1', 
			'questionv10' => 'q10a2', 
		];

		$general_reading = [
			'questionr1' => 'r1a7',
			'questionr2' => 'r2a8',
			'questionr3' => 'r3a1',
			'questionr4' => 'r4a3',
			'questionr5' => 'r5a6',
		];

		$general_listening = [
			'questionl1' => 'l1a3',
			'questionl2' => 'l2a2',
			'questionl3' => 'l3a2',
			'questionl4' => 'l4a1',
			'questionl5' => 'l5a3',
		];

		if( $general_answers['grammar'] ){
			foreach( $general_answers['grammar'] as $q_key => $a_key ){
				if( isset($general_grammar[$q_key]) ){
					if( $a_key == $general_grammar[$q_key] ){
						$total_grammar++;
					}
				} else{
					$general_data .= 'Grammar undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Grammar: ' . $total_grammar .'/'. count($general_grammar) . "\n";
		}

		if( $general_answers['reading'] ){
			foreach( $general_answers['reading'] as $q_key => $a_key ){
				if( isset($general_reading[$q_key]) ){
					if( $a_key == $general_reading[$q_key] ){
						$total_reading++;
					}
				} else{
					$general_data .= 'Reading undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Reading: ' . $total_reading .'/'. count($general_reading) . "\n";
		}

		if( $general_answers['listening'] ){
			foreach( $general_answers['listening'] as $q_key => $a_key ){
				if( isset($general_listening[$q_key]) ){
					if( $a_key == $general_listening[$q_key] ){
						$total_listening++;
					}
				} else{
					$general_data .= 'Listening undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Listening: ' . $total_listening .'/'. count($general_listening) . "\n";
		}

		if( $general_answers['writing'] ){
			$w_count = 1;
			foreach( $general_answers['writing'] as $a_writing ){
				$total_writing .= 'Writing '.$w_count.":\n";
				$total_writing .= '' . $a_writing . "\n\n";
				$w_count++;
			}

			$general_data .= 'Total Writing:' . "\n" . $total_writing . "\n";
		}

		return $general_data;
	}

	protected function _checkKids($general_answers){
		$general_data = 'English for Kids (6-9 years) (Kids Test)'. "\n";

		$total_reading = 0;
		$total_listening = 0;


		$general_reading = [
			'questiong1' => 'g1a2', // ✗
			'questiong2' => 'g2a1', // ✓
			'questiong3' => 'g3a1', // ✓
			'questiong4' => 'g4a2', // ✗
			'questiong5' => 'g5a1', // ✓
			'questiong6' => 'g6a1', // YES
			'questiong7' => 'g7a1', // YES
			'questiong8' => 'g8a1', // YES
			'questiong9' => 'g9a2', // NO
			'questiong10' => 'g10a2', // NO
		];

		$general_listening = [
			'questionl1' => 'l1a1',
			'questionl2' => 'l2a1',
			'questionl3' => 'l3a2',
		];

		if( $general_answers['grammar'] ){
			foreach( $general_answers['grammar'] as $q_key => $a_key ){
				if( isset($general_reading[$q_key]) ){
					if( $a_key == $general_reading[$q_key] ){
						$total_reading++;
					}

				} elseif( (mb_substr($q_key, 0, 2)) == 'tx' ){
					$general_data .= 'Reading-Writitng: ' . $q_key .' - '. $a_key . "\n";

				} else{
					$general_data .= 'Reading undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Reading: ' . $total_reading .'/'. count($general_reading) . "\n";
		}

		if( $general_answers['listening'] ){
			foreach( $general_answers['listening'] as $q_key => $a_key ){
				if( isset($general_listening[$q_key]) ){
					if( $a_key == $general_listening[$q_key] ){
						$total_listening++;
					}
				} else{
					$general_data .= 'Listening undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Listening: ' . $total_listening .'/'. count($general_listening) . "\n";
		}

		return $general_data;
	}

	protected function _checkIelts($general_answers){
		$general_data = 'English for IELTS (IELTS Test)' . "\n\n";

		$total_grammar = 0;
		$total_reading = 0;
		$total_listening = 0;
		$total_writing = '';

		$general_grammar = [
			'questionq1' => 'q1a3',
			'questionq2' => 'q2a1',
			'questionq3' => 'q3a1',
			'questionq4' => 'q4a1',
			'questionq5' => 'q5a1',
			'questionq6' => 'q6a3',
			'questionq7' => 'q7a2',
			'questionq8' => 'q8a3',
			'questionq9' => 'q9a1',
			'questionq10' => 'q10a1',
			'questionv1' => 'v1a7',
			'questionv2' => 'v2a8',
			'questionv3' => 'v3a3',
			'questionv4' => 'v4a10',
			'questionv5' => 'v5a5',
		];

		$general_reading = [
			'questionr1' => 'r1a5',
			'questionr2' => 'r2a4',
			'questionr3' => 'r3a2',
			'questionr4' => 'r4a4',
			'questionr5' => 'r5a3',
		];

		$general_listening = [
			'questionl1' => 'l1a1',
			'questionl2' => 'l2a2',
			'questionl3' => 'l3a2',
		];

		if( $general_answers['grammar'] ){
			foreach( $general_answers['grammar'] as $q_key => $a_key ){
				if( isset($general_grammar[$q_key]) ){
					if( $a_key == $general_grammar[$q_key] ){
						$total_grammar++;
					}
				} else{
					$general_data .= 'Grammar undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Grammar: ' . $total_grammar .'/'. count($general_grammar) . "\n";
		}

		if( $general_answers['reading'] ){
			foreach( $general_answers['reading'] as $q_key => $a_key ){
				if( isset($general_reading[$q_key]) ){
					if( $a_key == $general_reading[$q_key] ){
						$total_reading++;
					}
				} else{
					$general_data .= 'Reading undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Reading: ' . $total_reading .'/'. count($general_reading) . "\n";
		}

		if( $general_answers['listening'] ){
			foreach( $general_answers['listening'] as $q_key => $a_key ){
				if( isset($general_listening[$q_key]) ){
					if( $a_key == $general_listening[$q_key] ){
						$total_listening++;
					}
				} elseif( (mb_substr($q_key, 0, 1)) == 'l' ){
					$general_data .= 'Listening-Writing: ' . $q_key .' - '. $a_key . "\n";

				} else{
					$general_data .= 'Listening undefined: ' . $q_key .' - '. $a_key . "\n";
				}
			}

			$general_data .= 'Total Listening: ' . $total_listening .'/'. count($general_listening) . "\n";
		}

		if( $general_answers['writing'] ){
			$w_count = 1;
			foreach( $general_answers['writing'] as $a_writing ){
				$total_writing .= 'Writing '.$w_count.":\n";
				$total_writing .= '' . $a_writing . "\n\n";
				$w_count++;
			}

			$general_data .= 'Total Writing:' . "\n" . $total_writing . "\n";
		}

		return $general_data;
	}
}