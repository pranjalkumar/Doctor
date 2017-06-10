<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form action="register.php" method="post" id="regForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?=escape(Input::get('name'))?>" required>
            </div>

            <div class="form-group">
                <label for='username'>Email</label>
                <input type="email" class="form-control" name="username" value="<?=escape(Input::get('username'))?>" required>
            </div>
            <div class="form-group">
                <label for='contact'>Conatct</label>
                <input type="text" class="form-control" name="contact" value="<?=escape(Input::get('contact'))?>" required min="10">
            </div>
            <div class="form-group">
                <label for='password'>Password</label>
                <input type="password" class="form-control" name="password" id="reg_pwd" minlength="6" required>
            </div>

            <div class="form-group">
                <label for="password_again">Password Again</label>
                <input type="password" class="form-control" name="password_again" minlength="6" equalto="#reg_pwd" required>
            </div>

            <hr>

            <button type="submit" class="btn btn-success">Register</button>
            
            <input type="hidden" name="token" value="<?=$token?>">
        </form>
      </div>
    </div>

  </div>
</div>