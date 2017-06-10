<?php
require_once 'core/init.php';

$user = new User();

if(!Input::exists('get') || !$user->isLoggedIn())
{
    Redirect::to('index.php');
}

$user_id = $user->data()->id;

$dr_id=Input::get('dr_id');
$db=DB::getInstance();
$selected_doctor=$db->get('doctor',array('dr_id','=',$dr_id));

if ($selected_doctor->count() == 0) {
    Redirect::to('includes/errors/404.php');
} 

$dr_image=$selected_doctor->results()[0]->dr_image;
$dr_name=$selected_doctor->results()[0]->dr_name;
$dr_degree=$selected_doctor->results()[0]->dr_degree;
$dr_profession=$selected_doctor->results()[0]->dr_profession;
$dr_address = $selected_doctor->results()[0]->dr_address;

?>

<?php include 'view/submit_reports_view.php';?>