@extends('components.layout2')

<!-- Main Content Wrapper (with Sidebar Offset) -->
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar (if applicable) -->
        <div class="col-md-3">
            <!-- Sidebar content, like navigation, etc. -->
        </div>

        <!-- Product Details Section (Main Content) -->
        <div class="col-md-9">
            <h1 class="text-center">Subscription Details</h1>

    <style>
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .info {
            margin-bottom: 15px;
        }

        .info strong {
            display: inline-block;
            width: 150px;
            color: #555;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .actions a,
        .actions form {
            display: inline-block;
            margin: 0 10px;
        }

        .actions a {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }

        .actions a:hover {
            background-color: #0056b3;
        }

        .actions form button {
            padding: 10px 15px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .actions form button:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- <h1>Subscription Details</h1> --}}

        <!-- Subscription Details -->
        <div class="info">
            <strong>ID:</strong> {{ $subscription->id }}
        </div>
        <div class="info">
            <strong>User ID:</strong> {{ $subscription->user_id }}
        </div>
        <div class="info">
            <strong>Subscription Type:</strong> {{ $subscription->subscription_type }}
        </div>
        <div class="info">
            <strong>Start Date:</strong> {{ $subscription->start_date }}
        </div>
        <div class="info">
            <strong>End Date:</strong> {{ $subscription->end_date ?? 'N/A' }}
        </div>
        <div class="info">
            <strong>Status:</strong> {{ ucfirst($subscription->status) }}
        </div>
        <div class="info">
            <strong>Created At:</strong> {{ $subscription->created_at }}
        </div>
        <div class="info">
            <strong>Updated At:</strong> {{ $subscription->updated_at }}
        </div>

        <!-- Actions -->
        <div class="actions">
            <!-- Edit Button -->
            {{-- <a href="{{ route('subscriptions.edit', $subscription->id) }}">Edit</a> --}}

            <!-- Back to List Button -->
            <a href="{{ route('subscriptions.index') }}" style="background-color: green;">Back to List</a>

    
        </div>
    </div>
</body>

</html>
