<?php include 'includes/styles.html';?>
<?php include 'includes/navbar.php';?>

<link rel="stylesheet" href="css/detail.css">

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <br><br>
            <div class="card">
                <div class="row">
                    <div class="col-xs-2">
                        <img class="img-responsive" src="images/doctors_pic/<?=$dr_image?>"/>
                    </div>
                    <div class="col-xs-10">
                        <h2><a href="dr_profile.php?dr_id=<?=$dr_id?>"><?=$dr_name?></a></h2>
                        <em><?=$dr_degree?></em>
                        <br>
                        <p style="text-transform: capitalize"><?=$dr_profession?></p>
                        <hr>
                        <p><i class="fa fa-map-marker"></i> <?=$dr_address?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-offset-1 col-sm-6">
            <br>
            <h2>Submit Reports</h2>
            <br>

            <form id="reportForm" action="user_report.php?dr_id=<?php echo Input::get('dr_id');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for='name'>Name</label>
                    <input type="text" class="form-control" name="name" value="<?=$user->data()->username?>" required>
                </div>
                <div class="form-group">
                    <label for='age'>Age</label>
                    <input type="number" class="form-control" name="age" required maxlength="3" minlength="1">
                </div>
                <div class="form-group">
                    <label for='sex'>Sex</label>
                    <select class="form-control" name="sex">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for='problem'>Describe your problem</label>
                    <textarea class="form-control" name="problem" rows="7" required minlength="100" maxlength="900"></textarea>
                </div>
                <div>
                    <p><strong id="recordLabel">Record</strong></p>
                    <p>Only .jpg, .jpeg, .png, .pdf, .doc and .docx files are allowed.</p>
                    <p><input type="file" name="item_file[]"></p>
                    <!-- <p><a href="#" id="add_more">Add More</a></p> -->
                    <div id='dvFile'></div>
                    <p onclick="add_more()">Add more Files</p>
                </div>

                <br>

                <button type="submit" class="btn btn-primary" class="">Submit</button>

                <input type="hidden" name="token" value="<?=$token?>">
            </form>
        </div>
    </div>
</div>

<?php include 'includes/scripts.html';?>

<script src="js/multiFile.js"></script>
<script >
    function  add_more() {
  var txt = "<br><input type=\"file\" name=\"item_file[]\">";
  document.getElementById("dvFile").innerHTML += txt;
}
</script>