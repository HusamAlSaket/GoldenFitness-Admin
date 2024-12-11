<style>
    .test{
        display: grid;
        grid-template: repeat(3,1fr);
        gap: 2px;
        margin: 20px;
        padding: 10px;        

    }
</style>
<div class="container">
    <div class="row">

<div class="test" >
<section class="bg-white/95 backdrop-blur-md border border-red-500/10 rounded-3xl p-6 md:p-10 lg:p-12 max-w-2xl mx-auto shadow-2xl shadow-red-500/10 transition-all duration-500 hover:shadow-red-500/20">
    <header class="mb-10 text-center">
        <div class="mb-4 inline-block bg-red-50 px-4 py-2 rounded-full">
            <h2 class="text-2xl font-extrabold text-red-800 tracking-tight uppercase">
                {{ __('Profile Information') }}
            </h2>
        </div>
        <p class="text-sm text-gray-600 max-w-md mx-auto mt-3">
            {{ __("Keep your fitness journey profile up to date and accurate.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-red-200 rounded-lg opacity-50 group-hover:opacity-100 transition-opacity duration-300 blur-sm group-hover:blur-none"></div>
            <div class="relative bg-white border-2 border-transparent group-hover:border-red-300 rounded-lg transition-all duration-300">
                <x-input-label for="name" :value="__('Name')" class="text-red-700 font-semibold mb-2 block pl-4 pt-2" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="w-full px-4 py-3 bg-transparent
                           focus:outline-none 
                           transition duration-300"
                    :value="old('name', $user->name)"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>
            <x-input-error class="mt-2 text-red-600 text-sm pl-4" :messages="$errors->get('name')" />
        </div>

        <!-- Email Field -->
        <div class="group relative">
            <div class="absolute -inset-0.5 bg-red-200 rounded-lg opacity-50 group-hover:opacity-100 transition-opacity duration-300 blur-sm group-hover:blur-none"></div>
            <div class="relative bg-white border-2 border-transparent group-hover:border-red-300 rounded-lg transition-all duration-300">
                <x-input-label for="email" :value="__('Email')" class="text-red-700 font-semibold mb-2 block pl-4 pt-2" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="w-full px-4 py-3 bg-transparent
                           focus:outline-none 
                           transition duration-300"
                    :value="old('email', $user->email)"
                    required
                    autocomplete="username"
                />
            </div>
            <x-input-error class="mt-2 text-red-600 text-sm pl-4" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-red-50 border-l-4 border-red-400 rounded-md">
                    <p class="text-sm text-red-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="ml-2 underline text-sm text-red-600 hover:text-red-900 transition-colors">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center justify-center gap-4 pt-6">
            <x-primary-button class="
                bg-red-600 text-white px-8 py-3.5 rounded-full 
                hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                transition duration-300 transform hover:scale-105 active:scale-95 
                shadow-lg hover:shadow-xl hover:shadow-red-500/40
                group relative overflow-hidden
            ">
                <span class="relative z-10">{{ __('Save Profile') }}</span>
                <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold animate-pulse"
                >
                    {{ __('Profile Updated!') }}
                </p>
            @endif
        </div>
    </form>
</section>

<section class="bg-white/90 backdrop-blur-sm border-2 border-red-500/20 rounded-2xl p-6 md:p-8 lg:p-10 max-w-2xl mx-auto shadow-2xl transition-all duration-300 hover:shadow-red-500/30">
    <header class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-red-800 tracking-tight mb-3 uppercase">
            {{ __('Update Password') }}
        </h2>
        <p class="text-sm text-gray-600 max-w-md mx-auto">
            {{ __('Strengthen your account security with a long, random password.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password Field -->
        <div class="group">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-red-700 font-semibold mb-2 block" />
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="w-full px-4 py-3 border-2 border-red-300 rounded-lg bg-white 
                       focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent 
                       transition duration-300 group-hover:shadow-lg group-hover:shadow-red-500/20"
                autocomplete="current-password" 
            />
            <x-input-error 
                :messages="$errors->updatePassword->get('current_password')" 
                class="mt-2 text-red-600 text-sm" 
            />
        </div>

        <!-- New Password Field -->
        <div class="group">
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-red-700 font-semibold mb-2 block" />
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="w-full px-4 py-3 border-2 border-red-300 rounded-lg bg-white 
                       focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent 
                       transition duration-300 group-hover:shadow-lg group-hover:shadow-red-500/20"
                autocomplete="new-password" 
            />
            <x-input-error 
                :messages="$errors->updatePassword->get('password')" 
                class="mt-2 text-red-600 text-sm" 
            />
        </div>

        <!-- Confirm Password Field -->
        <div class="group">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-red-700 font-semibold mb-2 block" />
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="w-full px-4 py-3 border-2 border-red-300 rounded-lg bg-white 
                       focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent 
                       transition duration-300 group-hover:shadow-lg group-hover:shadow-red-500/20"
                autocomplete="new-password" 
            />
            <x-input-error 
                :messages="$errors->updatePassword->get('password_confirmation')" 
                class="mt-2 text-red-600 text-sm" 
            />
        </div>

        <!-- Save Button -->
        <div class="flex items-center justify-center gap-4 pt-4">
            <x-primary-button class="
                bg-red-600 text-white px-6 py-3 rounded-full 
                hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                transition duration-300 transform hover:scale-105 active:scale-95 
                shadow-md hover:shadow-lg hover:shadow-red-500/50
            ">
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold animate-pulse"
                >
                    {{ __('Password Updated!') }}
                </p>
            @endif
        </div>
    </form>
</section> 
<section class="bg-white/90 backdrop-blur-sm border-2 border-red-500/20 rounded-2xl p-6 md:p-8 lg:p-10 max-w-2xl mx-auto shadow-2xl transition-all duration-300 hover:shadow-red-500/30 space-y-6">
    <header class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-red-800 tracking-tight mb-3 uppercase">
            {{ __('Change Profile Picture') }}
        </h2>
        <p class="text-sm text-gray-600 max-w-md mx-auto">
            {{ __('Update your profile picture to better reflect your fitness journey.') }}
        </p>
    </header>
   <!-- Display profile picture -->
<div class="mb-4">
    @if ($user->image)
        <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="img-fluid rounded-circle" width="150" height="150">
    @else
        <!-- Fallback if no image is set -->
        <img src="{{ asset('storage/placeholder.jpg') }}" alt="Default Profile Picture" class="img-fluid rounded-circle" width="150" height="150">
    @endif
</div>

    <form action="{{ route('profile.update_picture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="picture">Profile Picture</label>
            <input type="file" name="picture" id="picture" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Picture</button>
    </form>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

        <!-- Save Button -->
        {{-- <div class="flex items-center justify-center gap-4 pt-6">
            <x-primary-button class="
                bg-red-600 text-white px-8 py-3.5 rounded-full 
                hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                transition duration-300 transform hover:scale-105 active:scale-95 
                shadow-lg hover:shadow-xl hover:shadow-red-500/40
                group relative overflow-hidden
            ">
                <span class="relative z-10">{{ __('Save Profile Picture') }}</span>
                <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
            </x-primary-button> --}}

            @if (session('status') === 'profile-picture-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold animate-pulse"
                >
                    {{ __('Profile Picture Updated!') }}
                </p>
            @endif
        </div>
    </form>
</section>

<section class="bg-white/90 backdrop-blur-sm border-2 border-red-500/20 rounded-2xl p-6 md:p-8 lg:p-10 max-w-2xl mx-auto shadow-2xl transition-all duration-300 hover:shadow-red-500/30 space-y-6">
    <header class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-red-800 tracking-tight mb-3 uppercase">
            {{ __('Delete Account') }}
        </h2>
        <p class="text-sm text-gray-600 max-w-md mx-auto">
            {{ __('Deleting your account will permanently remove all your data. Please download any important information before proceeding.') }}
        </p>
    </header>

    <div class="flex justify-center">
        <x-danger-button 
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="
                bg-red-600 text-white px-6 py-3 rounded-full 
                hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                transition duration-300 transform hover:scale-105 active:scale-95 
                shadow-md hover:shadow-lg hover:shadow-red-500/50
            "
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white rounded-2xl">
            @csrf
            @method('delete')

            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-red-800 mb-3">
                    {{ __('Confirm Account Deletion') }}
                </h2>
                <p class="text-sm text-gray-600 max-w-md mx-auto">
                    {{ __('This action cannot be undone. All your account data will be permanently deleted. Enter your password to confirm.') }}
                </p>
            </div>

            <div class="group mb-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="text-red-700 font-semibold mb-2 block" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-3 border-2 border-red-300 rounded-lg bg-white 
                           focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent 
                           transition duration-300 group-hover:shadow-lg group-hover:shadow-red-500/20"
                    placeholder="{{ __('Enter your password') }}"
                />
                <x-input-error 
                    :messages="$errors->userDeletion->get('password')" 
                    class="mt-2 text-red-600 text-sm" 
                />
            </div>

            <div class="flex justify-center space-x-4 mt-6">
                <x-secondary-button 
                    x-on:click="$dispatch('close')"
                    class="
                        px-6 py-3 rounded-full border-2 border-gray-300 
                        hover:bg-gray-100 transition duration-300 
                        transform hover:scale-105 active:scale-95
                    "
                >
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button 
                    class="
                        bg-red-600 text-white px-6 py-3 rounded-full 
                        hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                        transition duration-300 transform hover:scale-105 active:scale-95 
                        shadow-md hover:shadow-lg hover:shadow-red-500/50
                    "
                >
                    {{ __('Confirm Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
</div>
</div>
</div>
@include('components.layout2') 