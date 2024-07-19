<x-dashboard-layout>
    <h3 class="widget-title">Create Allocation</h3>

    <div class="default-table">
        <div class="actions">
            <a href="{{ route('allocations.index') }}" class="a-button cancel">Cancel</a>
        </div>

         <form method="POST" action="{{ route('allocations.store') }}" class="dashboard_form">
             @csrf
            <div class="input-grid">
             <div class="input-box">
                 <label for="">Name</label>
                 <select type="text" class="input-field" name="item">
                     <option value="" selected>--Select Item--</option>
                     @foreach($equipments as $equipment)
                          <option value="{{ $equipment->name }}" class="">{{ $equipment->name }}</option>
                     @endforeach
                 </select>
                 @error('item')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
                <div class="input-box">
                 <label for="">Allocated To</label>
                 <select type="text" class="input-field" name="allocated_to">
                      <option value="" selected>--Select User--</option>
                     @foreach($users as $user)
                          <option value="{{ $user->name }}" class="">{{ $user->name }}</option>
                     @endforeach
                     @error('allocated_to')
                        <div class="error-message">{{ $message }}</div>
                     @enderror
                 </select>
             </div>
             <div class="input-box">
                  <label for="">Allocated At</label>
                <input type="date" class="input-field" name="allocated_at" value="{{ old('allocated_at') }}" placeholder="">
                 @error('allocated_at')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
                <div class="input-box">
                  <label for="">Returned At</label>
                <input type="date" class="input-field" name="returned_at" value="{{ old('returned_at') }}" placeholder="">
                 @error('returned_at')
                    <div class="error-message">{{ $message }}</div>
                @enderror
             </div>
                <div class="input-box">
                  <label for="">State</label>
                <input type="text" class="input-field" name="state" value="{{ old('state') }}" placeholder="">
                 @error('state')
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
