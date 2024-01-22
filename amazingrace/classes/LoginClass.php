<?php

class loginClass{
    public function validateUser($post,$connPdo, $objpdoClass) {
		// print_r($post);
		// die;
        $data = $post;        
            $arrBindingValues = array();
            $arrBindingValues[':value1'] = strtolower(trim($post['employee_code']));;
           
            $query = "SELECT * FROM employeemaster_navrang WHERE emp_email=:value1 LIMIT 1";
             // print_r(123);
			// die;
            $user = $objpdoClass->exceuteQuery($connPdo,$query,$arrBindingValues);
			// echo "<pre>"; print_r($user);
			// die;
            if(count($user) > 0){

                //if($user[0]['password'] === $post['password']){
                // Logger::info("Login Failed [validateUser] : Failed " . $email);
                // $objmessageClass->add('e', 'Invalid User Name and Password, Please try again');
                return $this->createSession($user, $connPdo, $objpdoClass);
                //}else{
                   // Logger::info("Login Failed [validateUser] : Failed " . $post['username']);
                   // $objmessageClass->add('e', 'Invalid User Name and Password, Please try again');
                //}
            }else{
				return 'false';	
            }
    }

    public function createSession($user, $connPdo, $objpdoClass){
		//  echo '<pre>';print_r($user);die;
		$userDetails['login'] = "Yes";
		$userDetails['userid'] = $user[0]['id'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['emp_code'] = $user[0]['emp_code'];	
		$_SESSION['user_full_name'] = $user[0]['emp_name'];
		$_SESSION['login'] = "Yes";
		return $userDetails;
    }
    
}
?>