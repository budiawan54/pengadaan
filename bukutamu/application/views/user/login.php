<div class="row" >
               		                   
        <div  class="col-sm-4 col-sm-offset-4">
            <div class="content-box content-box-center">                        
                <span class="icon-profile-male color-info"></span>
                    <h4>Login Akun</h4>
               		<p>Masukan username dan password anda untuk melanjutkan.</p>
            </div>

            <form method="POST" action="<?php echo base_url('login') ?>" >
                <div class="form-group">
                	<input type="text" required="" name="Username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                	<input type="password" required="" name="Password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                	<button type="submit" class="btn btn-info btn-block"><i class="fa fa-login"></i> Login</button>
                </div>
            </form>

        </div>
</div>