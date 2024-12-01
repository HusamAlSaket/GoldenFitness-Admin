
@include('components.layout3')
v
<div class="container">
    <h1>Subscription Details</h1>

    <div class="card">
        <div class="card-header">
            Subscription Type: {{ $subscription->subscription_type }}
        </div>
        <div class="card-body">
            <p><strong>Start Date:</strong> {{ $subscription->start_date->format('Y-m-d') }}</p>
            <p><strong>End Date:</strong> {{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : 'N/A' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($subscription->status) }}</p>
            <p><strong>Price:</strong> ${{ number_format($subscription->price, 2) }}</p>

            <h5>Benefits</h5>
            <ul>
                @php
                    // Decode the benefits safely
                    $benefits = json_decode($subscription->benefits);
                @endphp
            
                @if($benefits && is_array($benefits) && count($benefits) > 0)
                    @foreach($benefits as $benefit)
                        <li>{{ $benefit }}</li>
                    @endforeach
                @else
                    <p>No benefits available</p>
                @endif
            </ul>
            
        
            
        </div>
    </div>

    <a href="{{ route('user.subscriptions.index') }}" class="btn btn-secondary mt-3">Back to Subscriptions</a>
</div>

@include('components.layout4')