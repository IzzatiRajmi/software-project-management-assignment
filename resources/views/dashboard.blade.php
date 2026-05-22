<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="padding: 8px 18px; background: #e53e3e; color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: bold; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <p style="margin-bottom:16px;">Redirecting you to the right page…</p>
                    @if(auth()->user()->usertype === 'admin')
                        <a href="{{ route('menu.manage') }}"
                           style="display:inline-block;padding:10px 24px;background:#8B5E3C;color:white;border-radius:8px;text-decoration:none;font-weight:600;">
                            Go to Menu Management →
                        </a>
                    @else
                        <a href="{{ route('menu.pax') }}"
                           style="display:inline-block;padding:10px 24px;background:#8B5E3C;color:white;border-radius:8px;text-decoration:none;font-weight:600;">
                            Go to Menu →
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-redirect in case user lands here
        @if(auth()->user()->usertype === 'admin')
            window.location.href = "{{ route('menu.manage') }}";
        @else
            window.location.href = "{{ route('menu.pax') }}";
        @endif
    </script>
</x-app-layout>