<div class="register-form text-center">
    <div class="register-holder">
        <div class="_spinner"></div>
        <div class="input-holder email-holder">
            <label for="email-id"><span>Email</span><img class="icon-input" src="{{asset('assets/images/Suche.svg')}}"
                                                         alt="email icon UtterVision">
                <input
                        required autocomplete="on"
                        autocompletetype=”email”
                        name="reg-email"
                        id="reg-email"
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
                        name="reg-password"
                        id="reg-password-id"
                        class="required password"
                        placeholder="Your Password"
                >

                <small></small>
            </label>
        </div>

        <div class="input-holder conform-password-holder">

            <label for="confirm-password-id"><span>Confirm</span>
                <img class="icon-input" src="{{asset('assets/images/Suche-2.svg')}}" alt="password icon UtterVision">
                <img class="icon-eye" src="{{asset('assets/images/Suche-3.svg')}}" alt="password icon UtterVision">
                <input
                        type="password"
                        name="reg-conform-password"
                        id="reg-confirm-password-id"
                        class="required confirm-password"
                        placeholder="Confirm Your Password"
                        required
                >

                <small></small>
            </label>
        </div>

        <div id="re-1" class="captcha-holder"></div>

        <div class="actions-btn">
            <button type="submit" class="register-btn green-btn btn-register btn-register-login">
                register
            </button>

            <div class="user-activity">
            </div>
                <p class="login-action mt-2 white-btn">Have Account!</p>
        </div>
    </div>
</div>
