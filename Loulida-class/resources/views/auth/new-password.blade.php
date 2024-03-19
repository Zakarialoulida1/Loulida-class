<x-app title="new-password">

    @if ($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>

    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="flex items-center md m p-8 justify-center">

        <div class="shadow-2xl rounded-md p-8 my-20 md:w-[50vw]  md:m-24  ">


            <div class="mb-4 bg-gray-200 p-2 rounded text-sm text-gray-600 dark:text-gray-400">
                {{ __(' fill this form  to get your new password.') }}
            </div>


            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="text" hidden name="token" value="{{ $token }}">
                <!-- Email Address -->
                <div class="input__wrapper">
                    <input id="email" type="email" name="email" placeholder="Your email"
                        title="Minimum 6 characters at least 1 Alphabet and 1 Number" class="input__field w-full">
                    <label for="email" class="input__label">Email</label>


                </div>
                <div class="input__wrapper">
                    <input id="password" type="password" name="password" placeholder="Your password"
                        title="Minimum 6 characters at least 1 Alphabet and 1 Number" class="input__field w-full">
                    <label for="password" class="input__label">Enter your new password</label>


                </div>
                <div class="input__wrapper">
                    <input id="password" type="password" name="password_confirmation" placeholder="Your password"
                        title="Minimum 6 characters at least 1 Alphabet and 1 Number" class="input__field w-full">
                    <label for="password" class="input__label">Confirm password</label>


                </div>


                <div class="flex items-center justify-end mt-4">
                    <button  class="px-4 py-2 mt-12 bg-[#ffb703] hover:bg-[#fb8500] text-white rounded">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app>
