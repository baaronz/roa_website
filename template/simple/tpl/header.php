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
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
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
            width: 100%;
            max-width: 400px;
            height: 450px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .form-control {
            background: rgba(30, 30, 30, 0.8);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 6px 10px;
            color: #ffffff;
            transition: all 0.3s ease;
            font-size: 13px;
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
            border-radius: 8px;
            padding: 6px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 13px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .nav-tabs {
            border: none;
            background: rgba(30, 30, 30, 0.8);
            border-radius: 8px;
            padding: 3px;
            margin-bottom: 10px;
            flex-shrink: 0;
        }
        
        .nav-tabs .nav-link {
            border: none;
            border-radius: 6px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 11px;
            padding: 5px 6px;
            margin: 0 1px;
        }
        
        .nav-tabs .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .nav-tabs .nav-link:hover {
            color: #ffffff;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            background: rgba(30, 30, 30, 0.8);
            color: #ffffff;
            font-size: 11px;
            padding: 6px 10px;
        }
        
        .card {
            background: rgba(25, 25, 25, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }
        
        .card-body {
            padding: 12px !important;
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
        
        h4 {
            font-size: 16px;
            margin-bottom: 10px !important;
        }
        
        h6 {
            font-size: 13px;
            margin-bottom: 5px;
        }
        
        label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 12px;
            margin-bottom: 3px;
        }
        
        .form-label {
            margin-bottom: 3px;
        }
        
        .mb-3 {
            margin-bottom: 8px !important;
        }
        
        .mb-4 {
            margin-bottom: 10px !important;
        }
        
        .py-4 {
            padding-top: 10px !important;
            padding-bottom: 10px !important;
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
        
        .tab-content {
            flex: 1;
            overflow-y: auto;
            padding: 0;
        }
        
        .p-4 {
            padding: 12px !important;
        }
        
        p {
            font-size: 12px;
            margin-bottom: 8px;
        }
        
        code {
            font-size: 11px;
        }
        
        pre {
            font-size: 11px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="main-container p-4">
