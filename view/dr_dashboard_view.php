<div class="container">
    <a href="#reports" class="pull-right btn btn-default">View Submitted Reports</a>
    <h2>Profile</h2>
    <br>

    <div class="card">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-3">
                <img class="img-responsive" src="images/doctors_pic/<?=$dr_image?>"/>
            </div>
        </div>

        <br>

        <form action="dr_profile_update.php" id="drUpdateForm" method="post">
            <p><strong>Name:</strong> <?=$dr_name?></p>
            <p><strong>Email:</strong> <?=$user->data()->username?></p>
            
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Degree</label>
                    <input type="text" name="degree" class="form-control" value="<?=$dr_degree?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Experience (years)</label>
                    <input type="text" name="exp" class="form-control" value="<?=$dr_experience?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Profession</label>
                    <input type="text" name="prof" class="form-control" value="<?=$dr_profession?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Clinic Name</label>
                    <input type="text" name="clinic" class="form-control" value="<?=$dr_clinic_name?>" required>
                </div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="addr" class="form-control" value="<?=$dr_address?>" required>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Contact</label>
                    <input type="number" name="contact" class="form-control" value="<?=$dr_contact?>" minlength="10" maxlength="13" required>
                </div>
                <div class="form-group col-sm-2">
                    <label>Fees</label>
                    <input type="numeric" name="fees" class="form-control" value="<?=$dr_fees?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label>Time</label>
                    <input type="text" name="time" class="form-control" value="<?=$dr_time?>" required>
                </div>
            </div>

            <div class="form-group">
                <label>Bio</label>
                <textarea class="form-control" name="bio" required><?=$dr_bio?></textarea>
            </div>
            <div class="form-group">
                <label>Award</label>
                <input type="text" name="award" class="form-control" value="<?=$dr_award?>" required>
            </div>

            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

<br>
<hr>
<br>

<h2 id="reports">Submitted Reports</h2>
<br>

<?php
if ($patient_count == 0) {
    echo "<p>No Reports have been submitted</p><br>";
}

for ($i = 0; $i < $patient_count; $i++)
{
    $patient_name = $patients->results()[$i]->name;
    $patient_age = $patients->results()[$i]->age;
    $patient_sex = $patients->results()[$i]->sex;
    $patient_problem = $patients->results()[$i]->problem;
    $patient_record = $patients->results()[$i]->record;
    $patient_email = $patients->results()[$i]->username;
?>

<div class="row card">
    <h3><?=$patient_name?></h3>
    <p>Age: <?=$patient_age?></p>
    <p>Sex: 

<?php switch ($patient_sex) {
    case "M":
        echo "Male";
        break;

    case "F":
        echo "Female";
        break;

    case "O":
        echo "Others";
        break;
}?>
    
    </p>

    <p><strong>Problem</strong></p>
    <p><?=$patient_problem?></p>

    <p><strong>Records</strong></p>
    <ul>
<?php
    $records = explode(':', $patient_record);
    $record_count = sizeof($records);

    for ($j = 0; $j < $record_count; ++$j)
    {
?>
        <li><a href="images/report_images/<?=$records[$j]?>" target="_blank"><?=$records[$j]?></a></li>
<?php } ?>
    </ul>
    <a href="mailto:<?=$patient_email?>" class="btn btn-info">Reply</a>

</div>

<?php } ?>

</div>