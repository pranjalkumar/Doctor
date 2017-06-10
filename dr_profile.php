<?php
require_once 'core/init.php';
//redirecting if no input exists
if(!Input::exists('get'))
{
    Redirect::to('../index.php');
}
//initiating connection to database
$dr_id=Input::get('dr_id');
$db=DB::getInstance();
$dr_data=$db->get('doctor',array('dr_id','=',$dr_id));
$count=$dr_data->count();
//checking if the value passed is in the database or not
if(!$count== 1)
{
    Redirect::to('includes/errors/404.php');
}


//storing every data in the variable
$dr_image=$dr_data->results()[0]->dr_image;
$dr_name=$dr_data->results()[0]->dr_name;
$dr_degree=$dr_data->results()[0]->dr_degree;
$dr_experience=$dr_data->results()[0]->dr_experience;
$dr_clinic_name=$dr_data->results()[0]->dr_clinic_name;
$dr_rating=$dr_data->results()[0]->dr_rating;
$dr_address=$dr_data->results()[0]->dr_address;
$dr_fees=$dr_data->results()[0]->dr_fees;
$dr_time=$dr_data->results()[0]->dr_time;
$dr_profession=$dr_data->results()[0]->dr_profession;
$dr_bio=$dr_data->results()[0]->dr_bio;
$dr_services=$dr_data->results()[0]->dr_services;

//dealing with the services offered
$service_offered=explode(',',$dr_services);
$no_of_services=sizeof($service_offered);

//updating the doctor veiws
$view_inc=$db->query("UPDATE doctor set dr_view=dr_view+1 where dr_id=".$dr_id);

include 'view/dr_profile_view.php';