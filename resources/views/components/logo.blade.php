<div class="logo-container">
    <svg viewBox="0 0 316 316" class="laravel-logo" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
        <path d="M305.8 81.125C305.77 80.995 ..." class="laravel-path"/>
    </svg>

    <svg viewBox="0 0 200 200" class="fitness-overlay" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <radialGradient id="glow" cx="50%" cy="50%" r="50%">
                <stop offset="0%" stop-color="#ff0000" stop-opacity="0.3"/>
                <stop offset="100%" stop-color="#ff0000" stop-opacity="0"/>
            </radialGradient>
        </defs>
        <path d="M40,100 L60,100 ..." class="heartbeat-line">
            <animate attributeName="opacity" values="0.6;1;0.6" dur="1s" repeatCount="indefinite"/>
        </path>
        <g transform="translate(100 100)" class="dumbbell">
            <rect x="-30" y="-4" width="60" height="8"/>
            <rect x="-45" y="-15" width="15" height="30">
                <animate attributeName="x" values="-45;-43;-45" dur="2s" repeatCount="indefinite"/>
            </rect>
            <rect x="-55" y="-10" width="10" height="20">
                <animate attributeName="x" values="-55;-53;-55" dur="2s" repeatCount="indefinite"/>
            </rect>
            <rect x="30" y="-15" width="15" height="30">
                <animate attributeName="x" values="30;32;30" dur="2s" repeatCount="indefinite"/>
            </rect>
            <rect x="45" y="-10" width="10" height="20">
                <animate attributeName="x" values="45;47;45" dur="2s" repeatCount="indefinite"/>
            </rect>
        </g>
        <circle cx="100" cy="100" r="70" class="energy-ring" stroke-dasharray="20 10">
            <animateTransform attributeName="transform" type="rotate" from="0 100 100" to="360 100 100" dur="10s" repeatCount="indefinite"/>
        </circle>
    </svg>
</div>
<style>
    /* public/css/logo.css */

.logo-container {
    position: relative;
    width: 100px;  /* Adjust size as needed */
    height: 100px;
}

.laravel-logo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.laravel-path {
    fill: #ffffff;  /* White color for Laravel logo */
}

.fitness-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    pointer-events: none;
}

.heartbeat-line {
    stroke: #ff0000;
    stroke-width: 3;
    fill: none;
}

.dumbbell {
    fill: #ff0000;
}

.energy-ring {
    stroke: #ff0000;
    stroke-width: 2;
    fill: none;
}

/* Animation for pulse effect */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.logo-container:hover .fitness-overlay {
    animation: pulse 2s infinite;
}

/* Make logo responsive */
@media (max-width: 768px) {
    .logo-container {
        width: 80px;
        height: 80px;
    }
}
</style>