<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI4 Portfolio App</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.25);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            color: #fff;
            margin-top: 0;
            padding-top: 30px;
        }

        /* Glassmorphism Container */
        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: var(--glass-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        /* Navbar Customization */
        .navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            box-shadow: var(--glass-shadow);
            margin-bottom: 2rem;
            padding: 10px 20px;
        }
        .navbar-light .navbar-nav .nav-link, 
        .navbar-light .navbar-brand {
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-light .navbar-nav .nav-link.active {
            font-weight: 600;
            text-shadow: 0 0 10px rgba(255,255,255,0.5);
        }
        
        /* Buttons */
        .btn-outline-primary {
            color: #fff;
            border-color: rgba(255,255,255,0.5);
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(4px);
        }
        .btn-outline-primary:hover {
            background: rgba(255,255,255,0.25);
            border-color: #fff;
            color: #fff;
        }
        .btn-primary {
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            border: none;
            box-shadow: 0 4px 15px rgba(0, 114, 255, 0.4);
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(4px);
            color: #fff;
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        /* Forms */
        .form-control, .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--glass-border);
            color: #fff;
            backdrop-filter: blur(4px);
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-label {
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        
        /* Headings */
        h1, h2, h3 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        /* Footer */
        footer.text-muted {
            color: rgba(255,255,255,0.7) !important;
        }
        hr {
            border-color: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <?php echo $this->include('partials/navbar');?>

        <!-- Section content -->
        <?= $this->renderSection('content');?>

        <!-- end Section Content -->
        <div class="row mt-4">
            <?php echo $this->include('partials/footer'); ?>
        </div>
    </div>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $this->renderSection('script');?>
</body>
</html>