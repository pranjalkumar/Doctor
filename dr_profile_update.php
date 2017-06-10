<?php

require_once 'core/init.php';
//register form validation
if (Input::exists('post')) {
    //if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
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
            $user_id = $user->data()->id;

            try {
                $user->update(array(
                    'contact' => Input::get('contact')
                ));
            }catch (Exception $e){die($e->getMessage());}

            $dr_contact=Input::get('contact');
            $dr_degree=Input::get('degree');
            $dr_experience=Input::get('exp');
            $dr_profession=Input::get('prof');
            $dr_clinic_name=Input::get('clinic');
            $dr_address=Input::get('addr');
            $dr_fees=Input::get('fees');
            $dr_time=Input::get('time');
            $dr_bio=Input::get('bio');
            $dr_award=Input::get('award');

            $database=DB::getInstance();
            try {
                $database->updateX('doctor', $user_id, array(
                    'dr_contact'=>$dr_contact,
                    'dr_degree'=>$dr_degree,
                    'dr_experience'=>$dr_experience,
                    'dr_profession'=>$dr_profession,
                    'dr_clinic_name'=>$dr_clinic_name,
                    'dr_address'=>$dr_address,
                    'dr_fees'=>$dr_fees,
                    'dr_time'=>$dr_time,
                    'dr_bio'=>$dr_bio,
                    'dr_award'=>$dr_award
                ), 'user_id');

            }catch (Exception $e){
                $e->getMessage();
            }

            Redirect::to('doctor_dashboard.php');

        } else {
//            displaying error in validation
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
        }
    //} // token
}
?>