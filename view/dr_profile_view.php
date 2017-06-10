<?php include 'includes/styles.html';?>

<link rel="stylesheet" href="css/detail.css">

<?php include 'includes/navbar.php';?>

<div class="container">

<br><br>
<div class="row">
    <div class="col-sm-9">
        <div class="card">
        <div class="row">
            <div class="col-xs-2">
                <img class="img-responsive" src="images/doctors_pic/<?=$dr_image?>"/>
            </div>
            <div class="col-xs-10">
                <div class="col-sm-6">
                    <h2><?=$dr_name?></h2>
                    <em><?=$dr_degree?></em>
                    <p><?=$dr_experience?> year(s) experience</p>
                    <br>
                    <p style="text-transform: capitalize"><?=$dr_profession?></p>
                    <small><strong><?=$dr_clinic_name?></strong></small>
                </div>
                <div class="col-sm-6">
                    <br><br>
                    <p class="text-success"><i class="fa fa-star"></i> <?=$dr_rating?> / 5</p>
                    <p><i class="fa fa-map-marker"></i> <?=$dr_address?></p>
                    <p><i class="fa fa-money"></i> <?=$dr_fees?></p>
                    <p><i class="fa fa-clock-o"></i> <?=$dr_time?></p>
                </div>
            </div>
        </div>
        <br><br>
        <hr>
        <br>
        <div>
            <div class="text-center">
            <?php for ($i = 0; $i < $no_of_services; ++$i)
            {
                switch ($service_offered[$i])
                {
                    case 1:
                        $loggedIn = $user->isLoggedIn() && $user->data()->group == 1;

                        if ($loggedIn) {
                    ?>
                        <a href="submit_reports.php?dr_id=<?=$dr_id?>" class="btn btn-primary btn-action">Submit Reports</a>
                    <?php } else { ?>
                        <button class="btn btn-primary btn-action" onclick="swal({title: 'Login Required', text: 'Login as a User to submit reports!', type: 'warning'})">Submit Reports</button>

                    <?php }
                        break;

                    case 2:
                    ?>
                        <a href="#" class="btn btn-primary btn-action">Chat</a>

                    <?php
                        break;

                    case 3:
                    ?>
                        <a href="#" class="btn btn-primary btn-action">Call</a>

                    <?php
                        break;
                }
            }
            ?>
            </div>

            <br>
            <hr>
            <br>
            
            <div class="bio">
                <h3>Bio</h3>
                <p><?=$dr_bio?></p>
            </div>
        </div>
        </div>
    </div>

    <?php include 'includes/scripts.html';?>

    <?php include 'includes/sidebar.php';?>
</div>