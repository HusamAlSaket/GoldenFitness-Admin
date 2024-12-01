@include('components.layout3')

<div class="pricing-container">
    @foreach(['Weekly', 'Monthly', 'Yearly'] as $type)
        @php
            $isDisabled = isset($activeSubscription) && $activeSubscription->subscription_type !== $type && $activeSubscription->end_date > now();
        @endphp
        <div class="pricing-card-wrapper">
            <form id="subscribeForm{{ $type }}" action="{{ route('user.subscriptions.store') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="subscription_type" value="{{ $type }}">
            </form>
            <div class="pricing-card {{ $isDisabled ? 'pricing-card_disabled' : '' }}">
                <div class="pricing-card_bg">
                    <img src="{{ asset('assets/img/bg/pricing-card1-bg.png') }}" alt="{{ $type }}">
                </div>
                <div class="pricing-card_icon">
                    <img src="{{ asset("assets/img/icon/picing-icon_1-" . ($loop->index + 1) . ".svg") }}" alt="{{ $type }}">
                </div>
                <h3 class="pricing-card_title">{{ $type }} Membership</h3>
                <h4 class="pricing-card_price">
                    <span class="currency">$</span>
                    @if($type === 'Weekly') 18
                    @elseif($type === 'Monthly') 65
                    @elseif($type === 'Yearly') 600
                    @endif
                    <span class="duration">
                        /{{ $type === 'Yearly' ? 'year' : 'month' }}
                    </span>
                </h4>
                <h5>Benefits</h5>
                <ul>
                    @php
                        $planBenefits = $benefits[$type] ?? [];
                    @endphp
                    @if(count($planBenefits) > 0)
                        @foreach($planBenefits as $benefit)
                            <li><i class="far fa-check-circle"></i> {{ $benefit }}</li>
                        @endforeach
                    @else
                        <li>No benefits available</li>
                    @endif
                </ul>
                @if(!$isDisabled)
                    <button type="button" class="btn style2" onclick="confirmSubscription('{{ $type }}')">Activate {{ $type }} Plan</button>
                @else
                    <button type="button" class="btn style2" disabled>Currently Active</button>
                @endif
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmSubscription(type) {
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to activate the ${type} subscription?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, activate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('subscribeForm' + type).submit();
                Swal.fire(
                    'Transaction Successful!',
                    `Your ${type} subscription has been activated.`,
                    'success'
                );
            }
        });
    }
</script>
<style>
    .pricing-container {
    display: flex; /* Use Flexbox for horizontal layout */
    gap: 20px; /* Add spacing between cards */
    justify-content: center; /* Center the cards horizontally */
    flex-wrap: wrap; /* Allow cards to wrap on smaller screens */
    padding: 20px;
}

.pricing-card-wrapper {
    flex: 1 1 calc(33.333% - 20px); /* Three cards per row, adjust to screen size */
    max-width: 300px; /* Optional: Set a max width */
    display: flex;
    justify-content: center;
}

.pricing-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.pricing-card_disabled {
    opacity: 0.5;
    pointer-events: none;
}

</style>
@include('components.layout4')
