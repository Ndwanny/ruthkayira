<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <h1 class="text-xl font-semibold text-gray-900">{{ config('app.name') }}</h1>
            <p class="text-sm text-gray-500 mt-1">Sign in to the admin panel</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="form-label">Email address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="form-input @error('email') border-red-400 @enderror"
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="form-input @error('password') border-red-400 @enderror"
                    >
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-2">
                    <input id="remember" type="checkbox" name="remember" class="rounded border-gray-300 text-gray-900 focus:ring-gray-400">
                    <label for="remember" class="text-sm text-gray-600">Remember me</label>
                </div>

                <button type="submit" class="btn-primary w-full justify-center py-2.5">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</body>
</html>
