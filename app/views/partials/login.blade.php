<section id="login">
        <div class="row">
            <h1>Log in with your email account</h1>
                <form role="form" action="{{ URL::to('/login') }}" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                    </div>
                    <div class="form-group">
                        <label for="key" class="sr-only">Password</label>
                        <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" ></span>
                        <span class="label">Remember me</span>
                        <input name="remember_me" type="hidden" value="0" >
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                </form>
                <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                <hr>
        </div> <!-- /.row -->
</section>


