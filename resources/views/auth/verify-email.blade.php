<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md border border-gray-200">
            {{-- Session Messages --}}
            @if (session('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-[#004677]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h2 class="mt-6 text-2xl font-extrabold text-gray-900">
                    Please verify your email
                </h2>
            </div>

            <div class="text-center text-gray-600 mb-6">
                <p>We've sent a verification link to your email address.</p>
                <p class="mt-2">Please check your inbox and click the link to complete your registration.</p>
            </div>

            <div class="text-center text-sm text-gray-500 mb-6">
                <p>Didn't receive the email?</p>
            </div>

            <form action="{{ route('verification.send') }}" method="post" class="mt-6">
                @csrf
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#004677] hover:bg-[#003355] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#004677] transition-colors">
                    Resend Verification Email
                </button>
            </form>

            <div class="mt-4 text-center text-sm text-gray-600">
                <p>If you still don't see it, please check your spam folder.</p>
            </div>
        </div>
    </div>
</x-layout>