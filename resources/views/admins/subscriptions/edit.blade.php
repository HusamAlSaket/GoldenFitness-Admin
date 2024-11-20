{{-- @extends('components.layout2')

@section('content')
    <div class="container">
        <h4>Edit Subscription</h4>
        <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div class="mb-3">
                <label class="form-label">Subscription Type</label>
                <input type="text" name="subscription_type" class="form-control" value="{{ old('subscription_type', $subscription->subscription_type) }}" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $subscription->start_date) }}" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $subscription->end_date) }}">
            </div>
        
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" {{ $subscription->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $subscription->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="expired" {{ $subscription->status == 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Update Subscription</button>
        </form>
        
        
    </div>
@endsection --}}
