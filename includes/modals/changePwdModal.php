<div id="changePwdModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form action="changepassword.php" method="post" id="changePwdForm">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" name="current_password" minlength="6" required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password" minlength="6" required>
            </div>

            <div class="form-group">
                <label for="new_password_again">New Password Again</label>
                <input type="password" class="form-control" name="new_password_again" minlength="6" equalto="#new_password" required>
            </div>

            <hr>

            <button type="submit" class="btn btn-success">Change Password</button>
            
            <input type="hidden" name="token" value="<?=$token?>">
        </form>
      </div>
    </div>

  </div>
</div>