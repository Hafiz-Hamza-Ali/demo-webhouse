
<div class="row">
    <div class="col-xs-12 col-lg-6 col-lg-offset-3 text-center claim_pswd">
        <!-- incldue error meesage page -->
        <h2>Law Firm Dashboard</h2>
        <div class="claim_login">
            <h4>Forgot Password</h4>
            <form action="{{ route('forgot.password') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="entity" value="{{ $entity }}" />
                <div class="form-group">
                    <label for="sra_pswd">Email</label>
                    <input name="email" type="email" required class="form-control" id="sra_pswd">
                </div>

                <button class="login_btn" type="submit">Submit</button>
            <br>

            </form>
            @include('includes.error_message')
        </div>
    </div>
</div>
