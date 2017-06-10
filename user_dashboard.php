<?php
ob_start();

include 'includes/styles.html';

include 'includes/navbar.php';
?>

<link rel="stylesheet" href="css/detail.css">

<?php
$user=new user();
if(!($user->isLoggedIn() && $user->data()->group==1)) {
    Redirect::to('index.php');
}

ob_end_flush();

$user_id = $user->data()->id;

$db = DB::getInstance();

$patients=$db->get('user_record',array('user_id','=',$user_id));
$patient_count=$patients->count();

include 'view/user_dashboard_view.php';

include 'includes/scripts.html';

?>

<script src="js/updateUserProfile.js"></script>