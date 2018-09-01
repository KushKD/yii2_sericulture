<?php
	namespace app\components;
	use Yii;
	/**
	 * this file contains the common functions
	 */
	class CommonUtility
	{
		/**
		* this function is used to get the sanatize params
		*@author Hemant thakur

		*/
	    function mysql_escape_string($string) {
	        $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	        $string = mysqli_real_escape_string($link, $string);
			mysqli_close($link);
	        return $string;
	    }
		function sanatizeParams($parameter, $strip_tags = true) {
		        if (is_array($parameter)) {
		            $results = array();
		            foreach ($parameter as $key => $value) {
		            	/**
		            	* check for nested array 
		            	*added by hemant
		            	*/
		            	if(is_array($value)){
		            		$returnValue[$key]=$this->sanatizeParams($value);
		            		$results=array_merge($results,$returnValue);
		            		continue;
		            	}
		            	// edit finished
		                $value = trim($value);
		                if ($strip_tags) {
		                    $value = strip_tags($value);
		                }
		                $value = $this->mysql_escape_string($value);
		                $results[$key] = $value;
		            }
		            return $results;
		        } else {
		            $parameter = trim($parameter);
		            if ($strip_tags) {
		                $parameter = strip_tags($parameter);
		            }
		            $parameter = $this->mysql_escape_string($parameter);
		            return $parameter;
		        }
		}

		function sanatizeString($string){
			$string=strip_tags(trim($string));
			return $string;
		}
		function sendMobileMsg($message,$mobileno,$smsservicetype='singlemsg',$isBulkSMS=false){
			$key=hash('sha512', SMS_GATEWAY_USER_ID . SMS_GATEWAY_SENDER_ID.$message);
			$data = array(
			   "username" => SMS_GATEWAY_USER_ID,  
			   "password" => sha1(SMS_GATEWAY_PASSWD),
			   "senderid" => SMS_GATEWAY_SENDER_ID,
			   "content" => $message,
			   "smsservicetype" =>$smsservicetype,
			   "mobileno" =>$mobileno,
			   // "key" => $key
			 );
			if(ENV!="DEV")
				$this->smsGateWayPush(SMS_GATEWAY, $data); //calling post_to_url to send otp sms
			return true;
		}
		function smsGateWayPush($url, $data) {
		    $fields = '';
		    foreach($data as $key => $value) {
		       $fields .= $key . '=' . $value . '&';
		    }
		    rtrim($fields, '&');
		    // echo "<pre>";print_r($fields);die;
		    $post = curl_init();
		   	curl_setopt_array($post, array(
		   	  CURLOPT_URL => $url,
		   	  CURLOPT_RETURNTRANSFER => true,
		   	  CURLOPT_CUSTOMREQUEST => "POST",
		   	  CURLOPT_POSTFIELDS => $fields,
		   	  CURLOPT_HTTPHEADER => array(
		   	    "cache-control: no-cache",
		   	    "content-type: application/x-www-form-urlencoded",
		   	  ),
		   	));
		    $result = curl_exec($post); //result from mobile seva server
		    // die("mar ja kuttte");    //output from server displayed
		    // echo "<pre>";print_r($result);die;
		    curl_close($post);
		}
		function getTeshilsFromDisttId($distt){
			$sql="select tehsil_name,tehsil_id from bo_tehsil where district_id=$distt and is_active='Y'";
			$connection=Yii::$app->db; 
			$command=$connection->createCommand($sql);
			// $command->bindParam(":district_id",$distt,PDO::PARAM_INT);
			$tehsils=$command->queryAll();
			// echo "<pre>";print_r($tehsils);die;
			return $tehsils;
		}
		function getVillagesFromTehId($tehId){
			$sql="select vill_id,vill_name from bo_village where tehsil_id=$tehId and is_active='Y'";
			$connection=Yii::$app->db; 
			$command=$connection->createCommand($sql);
			// $command->bindParam(":tehId",$tehId,PDO::PARAM_INT);
			$tehsils=$command->queryAll();
			// echo "<pre>";print_r($tehsils);die;
			return $tehsils;
		}
	}

?>