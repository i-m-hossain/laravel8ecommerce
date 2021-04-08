{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 flex">
                <label for="remember_me" class="flex items-center space-between mr-4">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                <label for="remember_me" class="flex items-center pr-2 space-between bg-green-200">
                   
                    <a href="{{ route('register') }}"><span class="ml-2 text-sm text-gray-600">{{ __('Sign up instead') }}</span></a>
                </label>
            </div>
             

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
                    <a href="{{ route('login.google') }}" style="margin-top: 0px !important;background: green;color: #ffffff;padding: 5px;border-radius:7px;" class="ml-2 btn-google">
                        <strong>Login With Google</strong>
                    </a>
                    <a href="{{ route('login.facebook') }}" style="margin-top: 0px !important;background: green;color: #ffffff;padding: 5px;border-radius:7px;" class="ml-2">
                        <strong>Facebook Login</strong>
                    </a><a href="{{ route('login.github') }}" style="margin-top: 0px !important;background: green;color: #ffffff;padding: 5px;border-radius:7px;" class="ml-2">
                        <strong>Github Login</strong>
                    </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>




 --}}

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
										<input type="email" id="frm-login-uname" name="email" placeholder="Type your email address" value={{ old('email') }} required autofocus>
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