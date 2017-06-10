<?php
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

$loggedIn = $user->isLoggedIn();

$token = Token::generate();

// admin check
//if($user->hasPermission('admin')) {
    //echo '<p>You are a Administrator!</p>';
//}

?>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle"
                    data-toggle="collapse"
                    data-target="#Navbar">
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
            </button>
            <a href="/" class="navbar-brand">Doctor</a>
        </div>
        <div class="collapse navbar-collapse"
            id="Navbar">
            <ul class="nav navbar-nav navbar-right text-center">
<?php if($loggedIn) { ?>
                <p class="navbar-text">Hello,

<?php
// doctor
if ($user->data()->group == 3) {
    echo "Dr.";
}
?>

<?=escape($user->data()->name)?></p>

<?php if ($user->data()->group == 3) { ?>
                <li><a href="doctor_dashboard.php">Profile</a></li>
<?php } else { ?>
                <li><a href="user_dashboard.php">Profile</a></li>
<?php } ?>

                <li><a href="#" data-toggle="modal" data-target="#changePwdModal">Change Password</a></li>
                <a href="logout.php" class="btn btn-primary navbar-btn">Log out</a>
<?php } else { ?>
                <button class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#loginModal">Login</button>
                <button class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#registerModal">Register</button>
                <button class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#doctorRegisterModal">Doctor Register</button>
<?php } ?>
            </ul>
        </div>
    </div>
</nav>

<?php include 'includes/modals/loginModal.php'; ?>

<?php include 'includes/modals/registerModal.php'; ?>

<?php include 'includes/modals/changePwdModal.php'; ?>

<?php include 'includes/modals/doctorRegisterModal.php'; ?>