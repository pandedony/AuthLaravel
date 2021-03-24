
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notify</title>
    <style>
        body {
            background-color:#bdc3c7;
            margin:0;
        }
        .card {
            background-color:#fff;
            padding:20px;
            margin:20%;
            text-align:center;
            margin:0px auto;
            width: 580px; 
            max-width: 580px;
            margin-top:10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .garis {
            width: 75%;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h3 class="">Welcome To Our Website</h3>
        <hr class="garis">
        <p>Klik tombol di bawah ini untuk melakukan reset password.</p>
        <p><a href="{{ url('/passwordreset', $token) }}" target="_blank" style="font-size: 20px; background-color:#caf7e3; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #007580; text-decoration: none; padding: 15px 25px; border-radius: 5px; border: 1px solid #caf7e3; display: inline-block;">Reset Password</a></p>
        <h4>Terima kasih telah bergabung dengan kami</h4>
    </div>
</body>
</html>