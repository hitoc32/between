<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
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
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        

        <!-- gender -->
        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
            <div class="col-md-6" style="padding-top: 8px">
                <input id="gender-m" type="radio" name="gender" value="male">
                <label for="gender-m">Male</label>
                
                <input id="gender-f" type="radio" name="gender" value="female">
                <label for="gender-f">Female</label>
                
                <input id="gender-o" type="radio" name="gender" value="other">
                <label for="gender-o">Other</label>
        
                @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- age -->
        <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
            <div class="col-md-6" style="padding-top: 8px">
                <input id="age-1" type="radio" name="age" value="10s">
                <label for="age-1">10s</label>
                
                <input id="age-2" type="radio" name="age" value="20s">
                <label for="age-2">20s</label>
                
                <input id="age-3" type="radio" name="age" value="30s">
                <label for="age-3">30s</label>
                
                <input id="age-4" type="radio" name="age" value="40s">
                <label for="age-4">40s</label>
                
                <input id="age-5" type="radio" name="age" value="50s">
                <label for="age-5">50s</label>
                
                <input id="age-6" type="radio" name="age" value="60s">
                <label for="age-6">60s</label>
                
                <input id="age-7" type="radio" name="age" value="70s">
                <label for="age-7">70s</label>
                
                <input id="age-8" type="radio" name="age" value="over 80s">
                <label for="age-8">over 80s</label>
        
                @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('gender') }}</strong>
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
