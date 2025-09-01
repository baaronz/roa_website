<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_config('page_title'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('background.png') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(3px);
            z-index: -1;
        }
        
        .main-container {
            background: rgba(20, 20, 20, 0.9);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            margin: 20px auto;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .form-control {
            background: rgba(30, 30, 30, 0.8);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 12px 15px;
            color: #ffffff;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: rgba(40, 40, 40, 0.9);
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            color: #ffffff;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .nav-tabs {
            border: none;
            background: rgba(30, 30, 30, 0.8);
            border-radius: 10px;
            padding: 5px;
        }
        
        .nav-tabs .nav-link {
            border: none;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-tabs .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .nav-tabs .nav-link:hover {
            color: #ffffff;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            background: rgba(30, 30, 30, 0.8);
            color: #ffffff;
        }
        
        .card {
            background: rgba(25, 25, 25, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }
        
        .text-muted {
            color: rgba(255, 255, 255, 0.6) !important;
        }
        
        .text-primary {
            color: #667eea !important;
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: #ffffff;
        }
        
        label {
            color: rgba(255, 255, 255, 0.9);
        }
        
        .modal-content {
            background: rgba(25, 25, 25, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }
        
        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn-close {
            filter: invert(1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container p-4">
            <div class="text-center mb-4">
                <h1 class="display-4 text-primary mb-3">
                    <i class="fas fa-gamepad me-2"></i>
                    <?php echo get_config('page_title'); ?>
                </h1>
                <p class="text-muted">Create your account and start your adventure!</p>
            </div>
