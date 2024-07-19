<x-dashboard-layout>
    <h3 class="widget-title">Create Equipment</h3>

    <div class="default-table">
        <div class="actions">
            <a href="{{ route('equipments.index') }}" class="a-button cancel">Cancel</a>
        </div>

         <form method="POST" action="{{ route('equipments.store') }}" class="dashboard_form">
             @csrf
            <div class="input-grid">
             <div class="input-box">
                 <label for="">Name</label>
                 <input type="text" class="input-field" name="name" value="{{ old('name') }}" placeholder="Name">
                 @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
            <div class="input-box">
                 <label for="">State</label>
                 <select type="text" class="input-field" name="state">
                     <option value="new" class="">New</option>
                     <option value="used" class="">Used</option>
                 </select>
             </div>
                <div class="input-box">
                 <label for="">Available</label>
                 <select type="text" class="input-field" name="available">
                     <option value="yes" class="">Yes</option>
                     <option value="no" class="">No</option>
                 </select>
             </div>
             <div class="input-box">
                  <label for="">Acquired At</label>
                <input type="date" class="input-field" name="acquired_at" value="{{ old('acquired_at') }}" placeholder="Acquired At">
                 @error('acquired_at')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
            </div>

             <div class="submit-button">
                 <button class="a-button">Save</button>
             </div>
         </form>
    </div>
</x-dashboard-layout>
