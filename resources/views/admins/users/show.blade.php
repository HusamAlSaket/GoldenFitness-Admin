    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff1f1;
            font-family: 'Arial', sans-serif;
        }
        .user-details-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: 2px solid #ff4444;
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        .user-details-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(to right, #ff4444, #ff7777);
        }
        .user-header {
            text-align: center;
            margin-bottom: 30px;
            color: #ff4444;
        }
        .user-info {
            background-color: #fff3f3;
            border-left: 4px solid #ff4444;
            padding: 15px;
            margin-bottom: 20px;
        }
        .user-info p {
            margin-bottom: 10px;
            color: #333;
        }
        .back-btn {
            background-color: #ff4444;
            border-color: #ff4444;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background-color: #ff7777;
            border-color: #ff7777;
        }
        .badge-custom {
            background-color: #ff4444;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="user-details-container">
            <div class="user-header">
                <h1 class="mb-3">User Details <span class="badge badge-custom">Profile</span></h1>
            </div>
            
            <div class="user-info">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> 
                    <span class="badge badge-custom">
                        {{ $user->role }}
                    </span>
                </p>
            </div>
            
            <div class="text-center">
                <a href="{{ route('users.index') }}" class="btn btn-primary back-btn">
                    <i class="fas fa-arrow-left me-2"></i>Back to Users
                </a>
            </div>
        </div>
    </div>
    @include('components.layout2') --}}
