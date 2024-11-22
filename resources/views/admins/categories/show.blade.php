<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff5757 0%, #f5f5f5 100%);
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        .category-card {
            width: 100%;
            max-width: 700px;
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
            transform-style: preserve-3d;
            transform: perspective(1000px) rotateX(10deg);
            transition: all 0.6s ease;
        }
        .category-card:hover {
            transform: perspective(1000px) rotateX(0);
            box-shadow: 0 30px 70px rgba(0,0,0,0.15);
        }
        .category-header {
            background: #ff5757;
            color: white;
            padding: 40px 30px;
            text-align: center;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        .category-title {
            font-size: 2.5rem;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .category-content {
            padding: 40px 30px;
            text-align: center;
        }
        .category-description {
            color: #333;
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        .category-btn {
            background-color: #ff5757;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(255,87,87,0.3);
        }
        .category-btn:hover {
            background-color: #ff7b7b;
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(255,87,87,0.4);
        }
        @media (max-width: 768px) {
            .category-card {
                transform: none;
            }
        }
    </style>
</head>
<body>
    <div class="category-card">
        <div class="category-header">
            <h1 class="category-title">{{ $category->category_name }}</h1>
        </div>
        <div class="category-content">
            <p class="category-description">{{ $category->description }}</p>
            <a href="{{ route('categories.index') }}" class="category-btn">
                Back to Categories
            </a>
        </div>
    </div>
</body>
</html>