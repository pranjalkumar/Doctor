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
            ),
            'degree'=>array(
                'name'=>'degree',
                'required'=>true,
            ),
            'exp'=>array(
                'name'=>'exp',
                'required'=>true,
            ),
            'prof'=>array(
                'name'=>'prof',
                'required'=>true,
            ),
            'clinic'=>array(
                'name'=>'clinic',
                'required'=>true,
            ),
            'addr'=>array(
                'name'=>'addr',
                'required'=>true,
            ),
            'fees'=>array(
                'name'=>'fees',
                'required'=>true,
            ),
            'time'=>array(
                'name'=>'time',
                'required'=>true,
            ),
            'dob'=>array(
                'name'=>'dob',
                'required'=>true
            ),
            'bio'=>array(
                'name'=>'bio',
                'required'=>true,
            ),
            'award'=>array(
                'name'=>'award',
                'required'=>true,
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
                    'group' => 3,
                    'contact'=>Input::get('contact')
                ));
            }catch (Exception $e){die($e->getMessage());}
            $db=DB::getInstance();
            $data=$db->get('users',array('username','=',Input::get('username')));
            $user_id=$data->results()[0]->id;

            $temp_name=$_FILES['pic']['tmp_name'];
            $file_name=basename($_FILES['pic']['name']);
            $new_name=$user_id.$file_name;

            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    move_uploaded_file($temp_name,'images\doctors_pic\\'.$new_name);
            }
            else{
                $new_name='default.jpg';
            }

//            echo $new_name;
            

            $check_list=$_POST['check_list'];
            $service='';
            foreach ($check_list as $selected)
            {
                switch ($selected){
                    case '1' : $service=$service.'1,';
                        break;
                    case '2' : $service=$service.'2,';
                        break;
                    case '3': $service=$service.'3,';
                }
            }
//            echo $service;
                $dr_services=substr($service,0,strlen($service)-1);
//            echo $service;
            $dr_name=Input::get('name');
            $dr_contact=Input::get('contact');
            $dr_degree=Input::get('degree');
            $dr_experience=Input::get('exp');
            $dr_profession=Input::get('prof');
            $dr_clinic_name=Input::get('clinic');
            $dr_address=Input::get('addr');
            $dr_fees=Input::get('fees');
            $dr_time=Input::get('time');
            $dr_dob=Input::get('dob');
            $dr_image=$new_name;
            $dr_bio=Input::get('bio');
            $dr_award=Input::get('award');

                $database=DB::getInstance();
            try {
                $dr_record = $database->insert('doctor', array(
                    'dr_name'=>$dr_name,
                    'dr_contact'=>$dr_contact,
                    'dr_degree'=>$dr_degree,
                    'dr_experience'=>$dr_experience,
                    'dr_profession'=>$dr_profession,
                    'dr_clinic_name'=>$dr_clinic_name,
                    'dr_address'=>$dr_address,
                    'dr_fees'=>$dr_fees,
                    'dr_time'=>$dr_time,
                    'dr_dob'=>$dr_dob,
                    'dr_image'=>$dr_image,
                    'dr_bio'=>$dr_bio,
                    'dr_award'=>$dr_award,
                    'dr_services'=>$dr_services,
                    'user_id'=>$user_id
                ));

            }catch (Exception $e){
                $e->getMessage();
            }
            Session::flash('home', 'Welcome ' . Input::get('username') . '! Your account has been registered. You may now log in.');

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