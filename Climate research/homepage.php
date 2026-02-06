<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user data
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT first_name, last_name, email, phone, gender, age, city, reg_date FROM members WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $phone, $gender, $age, $city, $reg_date);
$stmt->fetch();
$stmt->close();

$full_name = $first_name . ' ' . $last_name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Climate Research</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .navbar h1 {
            font-size: 24px;
        }
        
        .logout-btn {
            background: white;
            color: #1e3c72;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
        }
        
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .welcome-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .welcome-section h2 {
            color: #1e3c72;
            margin-bottom: 10px;
            font-size: 32px;
        }
        
        .welcome-section p {
            color: #666;
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto 20px;
            line-height: 1.6;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .info-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .info-card h3 {
            color: #1e3c72;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eaeaea;
            font-size: 22px;
        }
        
        .user-info p {
            margin-bottom: 12px;
            color: #555;
        }
        
        .user-info strong {
            color: #333;
            display: inline-block;
            width: 120px;
        }
        
        .research-info p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 15px;
        }
        
        .stats-card {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            text-align: center;
            padding: 30px;
        }
        
        .stats-card h3 {
            color: white;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .stat-number {
            font-size: 48px;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .stat-label {
            font-size: 18px;
            opacity: 0.9;
        }
        
        .footer {
            text-align: center;
            padding: 30px;
            color: #666;
            margin-top: 50px;
            border-top: 1px solid #eaeaea;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🌍 Climate Research Portal</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    
    <div class="container">
        <div class="welcome-section">
            <h2>Welcome, <?php echo htmlspecialchars($first_name); ?>!</h2>
            <p>Thank you for joining our mission to identify the causes of climate change in our country. Your contribution is vital to our research efforts.</p>
        </div>
        
        <div class="info-grid">
            <div class="info-card user-info">
                <h3>Your Profile</h3>
                <p><strong>Full Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars(null . $email); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars(null . $phone); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars(null . $gender); ?></p>
                <p><strong>Age:</strong> <?php echo htmlspecialchars(null . $age); ?> years</p>
                <p><strong>City:</strong> <?php echo htmlspecialchars(null . $city); ?></p>
                <p><strong>Member Since:</strong> <?php echo date('F j, Y', strtotime(null . $reg_date)); ?></p>
            </div>
            
            <div class="info-card research-info">
                <h3>Research Project</h3>
                <p>Our research focuses on identifying and analyzing the primary causes of climate change affecting our country, including:</p>
                <p>• Greenhouse gas emissions from industrial activities</p>
                <p>• Deforestation and land use changes</p>
                <p>• Agricultural practices and their environmental impact</p>
                <p>• Urbanization effects on local climate patterns</p>
                <p>• Coastal erosion and sea level rise monitoring</p>
                <p>Join our field studies, data collection activities, and community awareness programs.</p>
            </div>
            
            <div class="info-card stats-card">
                <h3>Research Progress</h3>
                <div class="stat-number">247</div>
                <div class="stat-label">Active Researchers</div>
                <div class="stat-number">18</div>
                <div class="stat-label">Ongoing Studies</div>
                <div class="stat-number">42</div>
                <div class="stat-label">Data Collection Sites</div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>© 2024 Climate Research Initiative. All rights reserved.</p>
        <p>Contact: research@climateinitiative.org | Phone: +254 700 000 000</p>
    </div>
</body>
</html>