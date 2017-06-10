<div class="row card">
    <div class="col-xs-2">
        <img class="img-responsive" src="images/doctors_pic/<?=$dr_image?>"/>
    </div>
    <div class="col-xs-10">
        <div class="col-sm-6">
            <h2><a href="dr_profile.php?dr_id=<?=$dr_id?>"><?=$dr_name?></a></h2>
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
            <br>
            <a href="dr_profile.php?dr_id=<?=$dr_id?>" class="btn btn-default">View Details</a>
        </div>
    </div>
</div>