@include('components.layout3')
    

<div class="container">
    <h1>Your Subscriptions</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Subscription Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Benefits</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->subscription_type }}</td>
                    <td>{{ $subscription->start_date->format('Y-m-d') }}</td>
                    <td>{{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : 'N/A' }}</td>
                    <td>{{ ucfirst($subscription->status) }}</td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{ route('user.subscriptions.show', $subscription->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('user.subscriptions.create') }}" class="btn btn-success">Activate New Subscription</a>
</div>

@include('components.layout4')