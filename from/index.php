<?php include('connection.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beauty saloon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .captcha {
            width: 98%;
            background: yellow;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
        }
    </style>
</head>

<body>


    <?php
    // generating the random numbers
    $rand = rand(9999, 1000);

    // Function to get the client IP address
    function user_ip_address()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }
    $ip_address =  user_ip_address();

    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="submit.php" method="POST">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required id="name">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control shadow-none" required id="email">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control shadow-none" required id="subject">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Message</label>
                            <input type="message" name="message" class="form-control shadow-none" required id="message">
                        </div>
                        <div class="col-8 mb-3">
                            <label class="form-label">Enter CaptCha</label>
                            <input type="text" name="" class="form-control shadow-none" required id="captcha">
                            <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
                        </div>
                        <div class="col-4 mb-3 mx-auto">
                            <label class="form-label">Captcha Code</label>
                            <div class="captcha"><?php echo $rand; ?></div>
                        </div>
                        <input type="hidden" name="user_ip_address" value="<?php echo $ip_address; ?>">
                        <div class="">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

