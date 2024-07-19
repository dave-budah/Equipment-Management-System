<x-auth-layout>
        <div class="auth__wrapper">
            <div class="col-md-4 mx-auto">
                <form class="auth__form" method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div class="mb-4">
                        <h3 class="widget-title">Login</h3>
                    </div>
                <div class="input-box">
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                     @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>

                <button class="btn submit-btn">Login</button>
                    <div class="my-3">
                        <p>Don't have an account? Register <a href="/register">here</a></p>
                    </div>
            </form>
            </div>
        </div>
</x-auth-layout>
