<div class="container">
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default m-a-lg">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
          {!! BootForm::openHorizontal(['sm' => [4, 8], 'md' => [4, 8], 'lg' => [3, 9]]) !!}
            {!! BootForm::text('Email', 'email') !!}
            {!! BootForm::password('Password', 'password') !!}
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{!! route('auth.register') !!}" class="btn btn-link">Need an account?  Register</a>
              </div>
            </div>
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
