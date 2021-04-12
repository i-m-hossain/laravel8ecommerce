<x-guest-layout>
     <!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('index') }}" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">

                                <x-jet-validation-errors class="mb-4" />
								<form name="frm-login" method="POST" action="{{ route('login') }}">
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Log in to your account</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
										<input type="email" id="frm-login-uname" name="email" placeholder="Type your email address" required autofocus value={{ old('email') }} >
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Password:</label>
										<input type="password"  id="frm-login-pass" name="password" placeholder="************" required autocomplte="current-password" >
									</fieldset>
									
									<fieldset class="wrap-input">
										<label class="remember-field">
											<input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
										</label>
										<a class="link-function left-position" href="{{ route('password.request') }}" title="Forgotten password?">Forgotten password?</a>
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Login" name="submit">
                                    <h2 class=" text-center social-title"> Social Login</h2>
                                    <div class="social-login">
                                        <div class="social-google flex-social">
                                           <a href="{{ route('login.google') }}" class="social-link"><i class="fa fab fa-google "></i> Google</a> 
                                        </div>
                                        <div class="social-github flex-social">
                                           <a href="{{ route('login.github') }}" class="social-link"><i class="fa fab fa-github "></i> Github</a> 
                                        </div>
                                        <div class="social-facebook flex-social">
                                            <a href="{{ route('login.facebook') }}" class="social-link"><i class=" fa fab fa-facebook-square"></i> Facebook</a>
                                        </div>
                                    </div>
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
 </x-guest-layout>