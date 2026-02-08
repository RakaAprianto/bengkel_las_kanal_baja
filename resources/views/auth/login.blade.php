<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Kanal Las Baja Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                        },
                        dark: {
                            800: '#1f2937',
                            900: '#111827',
                            950: '#0a0f1a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased bg-dark-950 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center space-x-3">
                <div class="w-12 h-12 bg-primary-600 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="text-left">
                    <h1 class="text-xl font-bold text-white">Kanal Las Baja</h1>
                    <p class="text-xs text-gray-400">Admin Control Panel</p>
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-dark-900 mb-2">Welcome Back</h2>
            <p class="text-gray-500 mb-6">Sign in to access your admin dashboard</p>

            @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="space-y-5">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="admin@example.com">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password"
                            name="password"
                            id="password"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox"
                                name="remember"
                                class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 transition-all">
                        Sign In
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-6">
            © {{ date('Y') }} Kanal Las Baja. All rights reserved.
        </p>
    </div>
</body>

</html>