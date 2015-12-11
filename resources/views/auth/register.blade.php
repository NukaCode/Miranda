<div class="container">
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default m-a-lg">
        <div class="panel-heading">
          <h3 class="panel-title">Register</h3>
        </div>
        <div class="panel-body">
          {!! BootForm::openHorizontal(['sm' => [4, 8], 'md' => [4, 8], 'lg' => [3, 9]]) !!}
            {!! BootForm::text('Email', 'email')->required() !!}
            {!! BootForm::text('Display Name', 'display_name')->required() !!}
            {!! BootForm::text('First Name', 'first_name') !!}
            {!! BootForm::text('Last Name', 'last_name') !!}
            {!! BootForm::password('Password', 'password')->required() !!}
            {!! BootForm::password('Confirm Password', 'password_confirmation')->required() !!}
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="{!! route('auth.register') !!}" class="btn btn-link">Have an account?  Login!</a>
              </div>
            </div>
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
