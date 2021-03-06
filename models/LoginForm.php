<?php

namespace app\models;

use Yii;
use yii\base\Model;
use  yii\web\Session;
use app\models\Users;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

     //Create Sesssion
     


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
             ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
      //  if ($this->validate()) {

           
           $session = Yii::$app->session; 
            // check if a session is already open
        if (!$session->isActive){
            /* echo "<pre>".$session->isActive; 
              echo "Im here"; */
               @$session->open();

        }

          $userData = new Users();

         /* echo "<pre>"; print_r($this->username); 
          echo "<pre>"; print_r($this->password); 
          die;*/
                

                

          $data = $userData->findByUsername($this->username);
          
        // echo "<pre>"; print_r($data); die;
          if(!empty($data)){
            /* echo "<pre>"; print_r($data); 
              echo "<pre>"; print_r($data['username']); 
              echo "<pre>"; print_r($data[0]['password']); 



             die;*/
             //Compare the Passwords username and ActiveFlag

             //Convert this->password to Hash
             $password_hash = $this->convert_password_to_hash($this->password, $data['password_salt']);
            //  echo($data['password']."<br>");
            //  echo($password_hash); die;

             if($data['password'] == $password_hash && $data['username'] == $this->username){

                 //Set Data To Session
                $session->set('username', $data['full_name']);
                $session->set('userid', $data['user_id']);

                return true;
             } else{
                Yii::$app->session->setFlash('info', "incorrect  password");
                return false;
             }
            
          }
 

           // return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
       // }
       Yii::$app->session->setFlash('danger', "incorrect username or password");
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }

        return $this->_user;
    }


      public function logout(){
  // echo "Im here";   die;
 $session = Yii::$app->session; 
        //clear session
         if ($session->isActive){
             //echo "<pre>".$session->isActive; 
              //echo "Im here";   die;
               $session->destroy();

        }

      }



      public function convert_password_to_hash($user_password, $password_salt){
         // echo($user_password) ; 
          //echo($password_salt);

          //Convert password to hash
         $password_check =  hash_hmac("sha1", $user_password, $password_salt);
        // echo($password_check);

         return $password_check;


      }
}
