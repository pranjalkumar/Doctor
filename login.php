<?php

require_once 'core/init.php';

if(Input::exists()) {
    //if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login) {
                $group=$user->data()->group;
                if($group==1){
                  echo "user";
                  //Redirect::to('index.php');
                }
                if($group==3) {
                    echo "doctor";
                    // $user_id = $user->data()->id;
                    // $db = DB::getInstance();
                    // $dr_search = $db->get('doctor', array('user_id', '=', $user_id));
                    // $dr_id=$dr_search->results()[0]->dr_id;
                    //Redirect::to('doctor_dashboard.php');
                }
            } else {
                echo 'failed'; // incorrect username or password
            }
        } else {
            foreach($validate->errors() as $error) {
                echo "failed";//$error, '<br>';
            }
        }
    //}
}
?>