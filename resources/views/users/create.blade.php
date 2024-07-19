<x-dashboard-layout>
    <h3 class="widget-title">Create a new User</h3>

     <div class="default-table">
        <div class="actions">
            <a href="{{ route('users.index') }}" class="a-button cancel">Cancel</a>
        </div>

         <form method="POST" action="{{ route('users.store') }}" class="dashboard_form">
             @csrf
            <div class="input-grid">
             <div class="input-box">
                <input type="text" class="input-field" name="name" value="{{ old('name') }}" placeholder="Name">
                 @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
             <div class="input-box">
                 <input type="text" class="input-field" name="email" value="{{ old('email') }}" placeholder="Email">
                 @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
             <div class="input-box">
                <input type="text" class="input-field" name="company" value="{{ old('company') }}" placeholder="Company">
                 @error('company')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
             <div class="input-box">
                 <select type="text" class="input-field" name="role">
                     <option value="user" class="">User</option>
                     <option value="companyadmin" class="">Company Admin</option>
                     <option value="superadmin" class="">Super Admin</option>
                 </select>
             </div>
            </div>

             <div class="submit-button">
                 <button class="a-button">Save</button>
             </div>
         </form>
    </div>
</x-dashboard-layout>
