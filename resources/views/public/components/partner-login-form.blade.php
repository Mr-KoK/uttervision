<div class="login-form text-center">
    <form method="POST" action="javascript:void(0)">
        <div class="_spinner"></div>
        <div class="input-holder email-holder">
            <label for="email-id"><span>Email</span><img class="icon-input" src="{{asset('assets/images/Suche.svg')}}"
                                                         alt="email icon UtterVision">
                <input
                        required autocomplete="on"
                        autocompletetype=”email”
                        name="email"
                        id="email"
                        class="required email"
                        placeholder="name@example.com"
                        type="email">
                <small></small>
            </label>
        </div>

        <div class="input-holder password-holder">

            <label for="password-id"><span>Password</span>
                <img class="icon-input" src="{{asset('assets/images/Suche-2.svg')}}" alt="password icon UtterVision">
                <img class="icon-eye" src="{{asset('assets/images/Suche-3.svg')}}" alt="password icon UtterVision">
                <input
                        type="password"
                        name="password"
                        id="password-id"
                        class="required password"
                        placeholder="Your Password"
                >

                <small></small>
            </label>
        </div>

        <div id="le-1" class="captcha-holder"></div>

        <div class="actions-btn">
            <button type="submit" class="partner-login-btn green-btn ">
                login
            </button>
            <div class="user-activity">
                <input {{ old('remember') ? 'checked' : '' }} hidden id="remember-login" type="checkbox"
                       name="remember-box">
                <label for="remember-login">
                    <span>Remember Me</span>
                </label>
            </div>
        </div>
    </form>

</div>
