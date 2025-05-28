<x-auth-layout>
    <!-- Session Status -->
    @if (session()->has('status') || !empty($errors))
    <div class="text-center w-90 m-auto">
        <p class="mb-2 {{ $errors ? 'text-danger' : (session('status') ? 'text-success' : '') }}">
            {{ !empty($errors) && !empty($errors->all()) ? implode('', $errors->all()) : (session('status') ? session('status') : "") }}
        </p>
    </div>
    @endif

    <form method="POST" action="{{ route('auth') }}" class="mt-4">
        @csrf
        <!-- Form -->
        <div class="form-group mb-4">
            <label for="email">@lang('locale.email')</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg> 
                </span>
                <input type="email" name="email" class="form-control" placeholder="@lang('locale.your_email')" id="email" autofocus required>
            </div>
        </div>
        
        <!-- End of Form -->
        <div class="form-group">
        <!-- Form -->
        <div class="form-group mb-4">
            <label for="password">@lang('locale.password')</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2">
                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg> 
                </span>
                <input type="password" name="password" placeholder="@lang('locale.password')" class="form-control" id="password" required>
            </div>
        </div>
        <!-- End of Form -->
        <div class="d-flex justify-content-between align-items-top mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"> 
                <label class="form-check-label mb-0" for="remember">@lang('locale.remember_me')</label>
            </div>
            {{-- @if (Route::has('password.request'))
            <div>
                <a href="{{ route('password.request') }}" class="small text-right">@lang('locale.forgot_pwd')</a>
            </div>
            @endif --}}
        </div>
        </div>
        <div class="d-grid">
            <button class="btn btn-gray-800">@lang('locale.sign_in')</button>
        </div>
    </form>
</x-auth-layout>
