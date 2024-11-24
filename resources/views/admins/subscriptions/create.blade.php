{{-- @extends('components.layout2')

@section('content')
<h1>Create Subscription</h1>
<form action="{{ route('subscriptions.store') }}" method="POST">
    @csrf
    <label for="user_id">User ID</label>
    <input type="text" id="user_id" name="user_id" required>
    
    <label for="subscription_type">Subscription Type</label>
    <select id="subscription_type" name="subscription_type" required>
        <option value="Monthly">Monthly</option>
        <option value="Yearly">Yearly</option>
        <option value="Weekly">Weekly</option>
    </select>

    <label for="start_date">Start Date</label>
    <input type="date" id="start_date" name="start_date" required>

    <label for="end_date">End Date</label>
    <input type="date" id="end_date" name="end_date">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        <option value="expired">Expired</option>
    </select>

    <button type="submit">Create Subscription</button>
</form>
@endsection --}}
