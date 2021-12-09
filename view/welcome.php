<div class="auth-wrapper d-flex align-items-center justify-content-center">
    <div class="auth-box bg-white border border-1 p-30 pt-50 rounded text-center fadeInDown animated">
        <img class="fw-65 rounded" src="<?php base_url("assets/vlogic/assets/images/logo.jpg") ?>" alt="Generic placeholder image" style="width: 130px !important">
        <div class="text-size-22 font-weight-normal mt-20">Air Shipping</div>
        <div class="mt-5">Sign in by entering your information below.</div>
        <form class="mt-30" action="<?php base_url('welcome/signin') ?>" method="POST">
            <div class="form-input">
                <input type="text" name="user_mail" value="<?php print $email ?>" class="form-control py-22" placeholder="Enter your email"><br>
                <input type="password" name="user_psw" class="form-control py-22" placeholder="Enter your password">
            </div>
            <br>
            <?php Response() ?>
            <div class="d-flex mt-10 justify-content-center">
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me">
                    <label class="form-check-label" for="remember-me">Remember me</label>
                </div> -->
                <div class="">Forgot password? <a class="text-primary" href="#">Contact your admin.</a></div>
            </div>
            <button type="submit" name="user-signin" class="btn btn-primary btn-block mt-25 py-11">Sign In</button>
            <div class="mt-20">Do not have an account? <a class="text-primary" href="#">Contact your admin.</a></div>
            <div class="mt-20"><a href="<?php base_url('myip') ?>" class="text-warning" target="_blank">Click to view your IP</a></div>
        </form>
    </div>
</div>