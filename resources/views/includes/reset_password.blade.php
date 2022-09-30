
<div class="row">
    <div class="col-xs-12 col-lg-6 col-lg-offset-3 text-center claim_pswd">
        <!-- incldue error meesage page -->
        @include('includes.error_message')

        <h2>Law Firm Dashboard</h2>
        <div class="claim_login">
            <h4>Create Password</h4>
            <form action="{{ $action }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="reset_token" value="{{ Request::query('token') }}" />
                <input type="hidden" name="type" value="{{ Request::query("type") }}" />
                <div class="form-group relative">
                    <label for="password">Password</label>
                    <input type="password" name="password" required class="form-control" id="password">
                    <span id="confirm_new_password_eye_container" onclick="changePasswordViewConfirm('password','confirm_password_viewIcon','confirm_password_slashIcon')">
                        <i class="glyphicon glyphicon-eye-open absolute" id="confirm_password_viewIcon"></i>
                        <i class="glyphicon glyphicon-eye-close absolute" id="confirm_password_slashIcon" style="display:none"></i>
                    </span>
                    <div class="password-requirements">
                        <h3>Requirements</h3>
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1C9F49" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                <p>Minimum of 8 Characters</p></li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1C9F49" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg><p>Mix of Upper Case and Lower Case Letters.</p></li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1C9F49" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg><p>Contains Numeric and Symbols</p></li>
                        </ul>
                        <h3>Requirements</h3>
                        <p>UMa@1234</p>

                    </div>
                </div>
                <div class="form-group relative">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="form-control" id="password_confirmation">
                    <span id="confirm_new_password_eye_container" onclick="changePasswordViewConfirm('password_confirmation','confirm_password_viewIcon1','confirm_password_slashIcon1')">
                        <i class="glyphicon glyphicon-eye-open absolute" id="confirm_password_viewIcon1"></i>
                        <i class="glyphicon glyphicon-eye-close absolute" id="confirm_password_slashIcon1" style="display:none"></i>
                    </span>
                </div>
                <div class="error-message" style="display: none;color:red">Passwords do not match.</div>
                <button class="login_btn" type="submit">Create Password</button>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
                $('form').submit(function(){
                 //   alert();
            var pass = $('#password').val();
            var passConfirm = $('#password_confirmation').val();
            var regularExpression  =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/ ;
            if(pass != passConfirm){
                event.preventDefault();
               $('.error-message').show();
               $(".error-message").append().html("Passwords do not match.");
                return false;
            }
            else if (!regularExpression.test(pass)) {
                $('.error-message').show();
                $(".error-message").append().html("Use 8 or more characters with a mix of upper & lower case letters, numbers & symbols.");
                return false;
            }
            else if(pass.length < 8){
                $('.error-message').show();
                $(".error-message").append().html("Password length must be 8 character.");
                return false;
            }

        });
    </script>
@endpush
