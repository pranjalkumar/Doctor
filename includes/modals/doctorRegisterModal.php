<div id="doctorRegisterModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Doctor Registration</h4>
      </div>
      <div class="modal-body">
        <form action="dr_register.php" method="post" id="drRegForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?=escape(Input::get('name'))?>" required>
            </div>

            <div class="form-group">
                <label for='username'>Email</label>
                <input type="email" class="form-control" name="username" value="<?=escape(Input::get('username'))?>" required>
            </div>

            <div class="form-group">
                <label for='password'>Password</label>
                <input type="password" class="form-control" name="password" id="dr_reg_pwd" minlength="6" required>
            </div>

            <div class="form-group">
                <label for="password_again">Password Again</label>
                <input type="password" class="form-control" name="password_again" minlength="6" equalto="#dr_reg_pwd" required>
            </div>

            <div class="form-group">
                <label for='contact'>Contact</label>
                <input type="text" class="form-control" name="contact" value="<?=escape(Input::get('contact'))?>" required min="10">
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="degree">Degree</label>
                    <input type="text" name="degree" class="form-control" value="<?=escape(Input::get('degree'))?>" required>
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="exp">Experience</label>
                    <input type="text" name="exp" class="form-control" value="<?=escape(Input::get('exp'))?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="prof">Profession</label>
                    <input type="text" name="prof" class="form-control" value="<?=escape(Input::get('prof'))?>" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="clinic">Clinic Name</label>
                    <input type="text" name="clinic" class="form-control" value="<?=escape(Input::get('clinic'))?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="addr">Address</label>
                <input type="text" name="addr" class="form-control" value="<?=escape(Input::get('addr'))?>" required>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="fees">Fees</label>
                    <input type="numeric" name="fees" class="form-control" value="<?=escape(Input::get('fees'))?>" required>
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="time">Time</label>
                    <input type="text" name="time" class="form-control" value="<?=escape(Input::get('time'))?>" required>
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="<?=escape(Input::get('dob'))?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="pic">Image</label>
                <input type="file" name="pic" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control" required><?=escape(Input::get('bio'))?></textarea>
            </div>
            
            <div class="form-group">
                <label for="award">Award</label>
                <input type="text" name="award" class="form-control" value="<?=escape(Input::get('award'))?>" required>
            </div>

            <p><strong>Services</strong></p>
            <div class="checkbox-inline">
                <label><input type="checkbox" name="check_list[]" value="1"> Submit Reports</label>
            </div>
            <div class="checkbox-inline">
                <label><input type="checkbox" name="check_list[]" value="2"> Chat</label>
            </div>
            <div class="checkbox-inline">
                <label><input type="checkbox" name="check_list[]" value="3" > Call</label>
            </div>
            
            <hr>

            <button type="submit" class="btn btn-success">Register</button>
            
            <input type="hidden" name="token" value="<?=$token?>">
        </form>
      </div>
    </div>

  </div>
</div>