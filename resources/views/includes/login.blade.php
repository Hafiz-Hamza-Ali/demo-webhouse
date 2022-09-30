<div class="row">
<div class="col-xs-12 col-md-3 claim_pswd">
</div>
    <div class="col-xs-12 col-md-6 claim_pswd">
        <!-- incldue error meesage page -->
        @include('includes.error_message')
        @if (Session::has('not_access'))
                    <div class="alert alert-danger text-dark">You Don't have right access</div>
                @endif
        <h2>Admin Login</h2>
        <div class="claim_login">
            <h4>Log In</h4>
            <form action="{{ $action }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email_address">Email Address</label>
                    <input name="email_address" type="email" class="form-control" id="email_address">
                </div>

                @if (Session::has('email_msg'))
                    <div class="alert alert-danger text-dark">Email address incorrect.</div>
                @endif

                <div class="form-group relative">
                    <label for="sra_pswd">Password</label>
                    <input name="password" type="password" class="form-control" id="sra_pswd">
                    <span id="confirm_new_password_eye_container" onclick="changePasswordViewConfirm('sra_pswd','confirm_password_viewIcon','confirm_password_slashIcon')">
                        <i class="glyphicon glyphicon-eye-open absolute" id="confirm_password_viewIcon"></i>
                        <i class="glyphicon glyphicon-eye-close absolute" id="confirm_password_slashIcon" style="display:none"></i>
                    </span>
                </div>

                @if (Session::has('pass_msg'))
                    <div class="alert alert-danger text-dark">Password incorrect.</div>
                @endif

                <button class="login_btn" type="submit">Log In</button>
                <hr>
                <a href="{{ $forgotRoute }}" class="forgot_btn" type="">Forgot Password</a>
            </form>
        </div>
    </div>
</div>
