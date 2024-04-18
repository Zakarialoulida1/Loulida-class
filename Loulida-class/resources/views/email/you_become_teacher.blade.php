<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Become a Teacher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f3f4f6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }

        img {
            width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        
            <img src="http://127.0.0.1:8000/images/logos.png" alt="Logo">
        
        <h1>Hello {{ $name }},</h1>
        
        <p>Congratulations! You have become a teacher with us.</p>
        
        <p>Your email address is: {{ $email }}.</p>

        <p>Now you can create your new subjects and attach your course files, exercises, and corrections.</p>
        
        <p>Thank you for using our application!</p>
    </div>
</body>
</html>
