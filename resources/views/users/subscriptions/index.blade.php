@include('components.layout3')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="pricing-area">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title">Your Active subscriptions</h2>
        </div>
        <div class="pricing-container">
            @foreach ($subscriptions as $subscription)
                <div class="pricing-card-wrapper m-3">
                    <div class="pricing-card {{ $subscription->subscription_type === 'Yearly' ? 'pricing-card_active' : '' }}">
                        <div class="pricing-card_bg">
                            <img src="{{ asset('assets/img/bg/pricing-card1-bg.png') }}" alt="Background">
                        </div>
                        <div class="pricing-card_icon">
                            <img src="{{ asset('assets/img/icon/picing-icon_1-' . ($loop->index + 1) . '.svg') }}" alt="Icon">
                        </div>
                        <h3 class="pricing-card_title">
                            {{ ucfirst($subscription->subscription_type) }} Membership
                        </h3>
                        <h4 class="pricing-card_price">
                            <span class="currency">$</span>{{ number_format($subscription->price, 2) }}
                        </h4>
                        <p class="pricing-card_content">
                            This category typically offers access to the gym's facilities and equipment.
                        </p>
                        <div class="checklist">
                            <ul>
                                @php
                                    $benefits = json_decode($subscription->benefits);
                                @endphp
                                @if ($benefits && is_array($benefits))
                                    @foreach ($benefits as $benefit)
                                        <li><i class="far fa-check-circle"></i> {{ $benefit }}</li>
                                    @endforeach
                                @else
                                    <li><i class="far fa-times-circle"></i> No benefits available</li>
                                @endif
                            </ul>
                        </div>
                        <a class="btn style2" href="{{ route('user.subscriptions.show', $subscription->id) }}">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    
</style>

@include('components.layout4')
