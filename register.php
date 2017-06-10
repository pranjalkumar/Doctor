<?php

require_once 'core/init.php';
//register form validation
if (Input::exists('post')) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'name' => 'Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'name'=>'Email',
                'required'=>true,
                'min'=>4,
                'max'=>30,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'contact'=>array(
                'name'=>'contact',
                'required'=>true,
                'min'=>10,
                'max'=>13
            )
        ));
//data entry in users table
        if ($validate->passed()) {
            $user = new User();
            $salt = Hash::salt(32);

            try {
                $user->create(array(
                    'name' => Input::get('name'),
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1,
                    'contact'=>Input::get('contact')
                ));
            }catch (Exception $e){die($e->getMessage());}
            Session::flash('home', 'Welcome ' . Input::get('name') . '! Your account has been registered. You may now log in.');

            Redirect::to('index.php');

        } else {
//            displaying error in validation
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
        }
    }
}
?>