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
            overflow: hidden;
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
            background: #6c757d;
            border: none;
            border-radius: 8px;
            padding: 6px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 13px;
        }
        
        .btn-primary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
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
            background: #6c757d;
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
            margin-bottom: 10px;
        }
        
        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.3);
        }
        
        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid rgba(40, 167, 69, 0.3);
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
        
        .card-body {
            padding: 12px !important;
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
        
        .tab-content {
            flex: 1;
            overflow: hidden;
            padding: 0;
        }
        
        .tab-pane {
            height: 100%;
            overflow: hidden;
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
        
        .server-info-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100%;
            text-align: center;
            padding-top: 20px;
        }
        
        .form-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .form-fields {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        
        .form-submit {
            margin-top: auto;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab">Register</button>
                <button class="nav-link" id="nav-serverinfo-tab" data-bs-toggle="tab" data-bs-target="#nav-serverinfo" type="button" role="tab">Server Information</button>
                <button class="nav-link" id="nav-howtoconnect-tab" data-bs-toggle="tab" data-bs-target="#nav-howtoconnect" type="button" role="tab">How to Connect</button>
            </div>
        </nav>
        
        <div class="tab-content" id="nav-tabContent">
