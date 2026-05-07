<html class="h-full bg-gray-900">
<script src="https://cdn.tailwindcss.com"></script>

<body class="h-full">

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"
                class="mx-auto h-12 w-auto" />
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-white">Sign in to your account</h2>
            <p class="mt-2 text-center text-sm text-gray-400">Access your account securely</p>
        </div>

        @if ($errors->any())
            <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-400 text-sm font-medium">• {{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="bg-white/5 backdrop-blur px-6 py-8 rounded-lg shadow-xl border border-white/10">
                <form action="{{ route('action.login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-100">Email address</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" required autocomplete="email"
                                class="block w-full rounded-lg bg-white/10 px-4 py-3 text-base text-white outline-none border border-white/20 placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition" />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-semibold text-gray-100">Password</label>
                            <div class="text-sm">
                                <a href="#"
                                    class="font-semibold text-indigo-400 hover:text-indigo-300 transition">Forgot
                                    password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required
                                autocomplete="current-password"
                                class="block w-full rounded-lg bg-white/10 px-4 py-3 text-base text-white outline-none border border-white/20 placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition" />
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full rounded-lg  bg-indigo-500 px-4 py-3 text-sm font-semibold text-white hover:from-indigo-500 hover:to-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition duration-200 shadow-lg">
                            Sign in
                        </button>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-gray-400">
                    Not a member?
                    <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300 transition">Start a 14
                        day free
                        trial</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>
