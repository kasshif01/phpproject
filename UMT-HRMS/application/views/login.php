<!-- Simple login form -->
<!-- Form with validation -->
<form action="" class="form-validate" method="post">
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group">Login to UMT-HRMS <small class="display-block">Your credentials</small></h5>
        </div>
        <?php
        $error_str = validation_errors();

        if ($error_str != '') {
            ?>
            <div class="alert alert-danger no-border">
                <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">Oh snap!</span> Wrong email or Password. Please try again.
            </div>
            <?php
        }
        ?>
        <div class="form-group has-feedback has-feedback-left">
            <input type="email" class="form-control" placeholder="Email ID" name="emp_email" required="required">
            <div class="form-control-feedback">
                <i class="icon-envelope text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <input type="password" class="form-control" placeholder="Password" name="emp_password" required="required">
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
        </div>

        <div class="form-group login-options">
            <div class="row">
                <div class="col-sm-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" class="styled" checked="checked">
                        Remember
                    </label>
                </div>

                <div class="col-sm-6 text-right">
                    <a href="<?php echo base_url(); ?>Login/forgot_password">Forgot password?</a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
        </div>


    </div>
</form>
<!-- /form with validation -->
<!-- /simple login form -->



