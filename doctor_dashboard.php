<?php
ob_start();

include 'includes/styles.html';

include 'includes/navbar.php';
?>

<link rel="stylesheet" href="css/detail.css">

<?php
$user=new user();
if(!($user->isLoggedIn() && $user->data()->group==3)) {
    Redirect::to('index.php');
}

ob_end_flush();

$user_id = $user->data()->id;

$db = DB::getInstance();

$dr_data = $db->get('doctor', array('user_id', '=', $user_id));

$dr_id=$dr_data->results()[0]->dr_id;
$dr_image=$dr_data->results()[0]->dr_image;
$dr_name=$dr_data->results()[0]->dr_name;
$dr_contact=$dr_data->results()[0]->dr_contact;
$dr_degree=$dr_data->results()[0]->dr_degree;
$dr_experience=$dr_data->results()[0]->dr_experience;
$dr_clinic_name=$dr_data->results()[0]->dr_clinic_name;
$dr_rating=$dr_data->results()[0]->dr_rating;
$dr_address=$dr_data->results()[0]->dr_address;
$dr_fees=$dr_data->results()[0]->dr_fees;
$dr_time=$dr_data->results()[0]->dr_time;
$dr_profession=$dr_data->results()[0]->dr_profession;
$dr_bio=$dr_data->results()[0]->dr_bio;
$dr_award=$dr_data->results()[0]->dr_award;

$patients=$db->query('SELECT user_record.*, users.username FROM user_record, users WHERE user_record.user_id = users.id AND user_record.dr_id ='.$dr_id);
$patient_count=$patients->count();

include 'view/dr_dashboard_view.php';

include 'includes/scripts.html';