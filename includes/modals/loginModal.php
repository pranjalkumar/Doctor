<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form id="loginForm">
            <div class="form-group">
                <label for='username'>Email</label>
                <input type="email" class="form-control" name="username" required>
            </div>

            <div class="form-group">
                <label for='password'>Password</label>
                <input type="password" class="form-control" name="password" minlength="6" required>
            </div>

            <p id="loginError" class="text-danger"></p>

            <hr>

            <button type="submit" class="btn btn-success pull-right">Login</button>

            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>

            <input type="hidden" name="token" value="<?=$token?>">
        </form>
      </div>
    </div>

  </div>
</div>