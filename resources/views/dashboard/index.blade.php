<x-dashboard-layout>
    @auth
    <div class="container">
        <div class="landing__card">
            <div>
                <h3 class="widget-title">Welcome to Selvig Procurement System</h3>
                <p>Once your account is processed you will be able to see more page on this system.</p>
            </div>
            <div class="avatar-lg">
                <img src="{{ Storage::url('user.png') }}" alt="avatar">
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="btn logout-button" onclick="event.preventDefault(); this.closest('form').submit()">Logout</a>
                </form>
            @endauth
        </div>
    </div>
    @endauth
</x-dashboard-layout>
