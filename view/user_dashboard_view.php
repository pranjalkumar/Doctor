<div class="container">
    <h2>Profile</h2>
    <br>

    <div class="card">
        <p><strong>Name</strong>: <?=$user->data()->name?></p>
        <p><strong>Email</strong>: <?=$user->data()->username?></p>

        <form id="updateUserProfileForm">
            <div class="form-group">
                <label>Contact</label>
                <input type="number" name="contact" class="form-control" value="<?=$user->data()->contact?>" minlength="10" maxlength="13" required>                
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

<br>
<hr>
<br>

<h2>Submitted Reports</h2>
<br>

<?php

if ($patient_count == 0) {
    echo "<p>You have not submitted any reports.</p><br>";
}

for ($i = 0; $i < $patient_count; $i++)
{
    $patient_name = $patients->results()[$i]->name;
    $patient_age = $patients->results()[$i]->age;
    $patient_sex = $patients->results()[$i]->sex;
    $patient_problem = $patients->results()[$i]->problem;
    $patient_record = $patients->results()[$i]->record;
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

    <a href="images/report_images/<?=$patient_record?>" class="btn btn-default">View Record</a>

</div>

<?php } ?>

</div>