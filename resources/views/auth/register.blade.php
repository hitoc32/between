<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ユーザーネーム')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワードの確認')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        

        <!-- gender -->
        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
            <div class="col-md-6" style="padding-top: 8px">
                <input id="gender-m" type="radio" name="gender" value="男性">
                <label for="gender-m">男性</label>
                
                <input id="gender-f" type="radio" name="gender" value="女性">
                <label for="gender-f">女性</label>
                
                <input id="gender-o" type="radio" name="gender" value="その他">
                <label for="gender-o">その他</label>
        
                @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- age -->
        <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">年齢</label>
            <div class="col-md-6" style="padding-top: 8px">
                <input id="age-1" type="radio" name="age" value="10代">
                <label for="age-1">10代</label>
                
                <input id="age-2" type="radio" name="age" value="20代">
                <label for="age-2">20代</label>
                
                <input id="age-3" type="radio" name="age" value="30代">
                <label for="age-3">30代</label>
                
                <input id="age-4" type="radio" name="age" value="40代">
                <label for="age-4">40代</label>
                
                <input id="age-5" type="radio" name="age" value="50代">
                <label for="age-5">50代</label>
                
                <input id="age-6" type="radio" name="age" value="60代">
                <label for="age-6">60代</label>
                
                <input id="age-7" type="radio" name="age" value="70代">
                <label for="age-7">70代</label>
                
                <input id="age-8" type="radio" name="age" value="80代">
                <label for="age-8">80代</label>
        
                @if ($errors->has('age'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('age') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
