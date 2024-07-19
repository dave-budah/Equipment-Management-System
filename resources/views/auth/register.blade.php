<x-auth-layout>
        <div class="auth__wrapper">
            <div class="col-md-4 mx-auto">
                <form class="auth__form" method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="mb-4">
                        <h3 class="widget-title">Signup</h3>
                    </div>
                    <div class="input-box">
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Fullname">
                     @error('name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                     @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                     <div class="input-box">
                  <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Confirm Password">
                     @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn submit-btn">Signup</button>
                    <div class="my-3">
                        <p>Already have an account? Login <a href="/">here</a></p>
                    </div>
            </form>
            </div>
        </div>
</x-auth-layout>
