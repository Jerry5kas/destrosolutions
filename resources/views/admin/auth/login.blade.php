<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-gray-600">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-500 to-blue-300/30">
        <div class="w-full max-w-md bg-white/90 backdrop-blur rounded-xl shadow-xl border border-blue-500/20 p-8">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-semibold text-blue-600">Admin Portal</h1>
                <p class="text-sm text-gray-600">Sign in to continue</p>
            </div>

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" />
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Password</label>
                    <input name="password" type="password" required
                        class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" />
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        Remember me
                    </label>
                </div>

                <button type="submit"
                    class="w-full inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-white hover:bg-blue-500 transition">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>


