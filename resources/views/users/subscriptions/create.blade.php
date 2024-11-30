@include('components.layout3')


<div class="container">
    <h1>Activate a New Subscription</h1>

    <form action="{{ route('user.subscriptions.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="subscription_type" class="form-label">Choose Subscription Type</label>
            <select name="subscription_type" id="subscription_type" class="form-select">
                <option value="Weekly" {{ old('subscription_type') == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                <option value="Monthly" {{ old('subscription_type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="Yearly" {{ old('subscription_type') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
            </select>

            @error('subscription_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Activate Subscription</button>
    </form>

    <a href="{{ route('user.subscriptions.index') }}" class="btn btn-secondary mt-3">Back to Subscriptions</a>
</div>
@include('components.layout4')
