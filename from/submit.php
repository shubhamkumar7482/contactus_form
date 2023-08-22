<?php
    include('connection.php');

    if (isset($_POST['submit'])) {
        $frm_data = filteration($_POST);

        //data inserting into data base 
        $user_q = $con->prepare("INSERT INTO `contact_form`(`name`, `email`, `subject`, `message`, `user_ip_address`) VALUES (?,?,?,?,?)");
        $user_q->bind_param("sssss", $frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message'], $frm_data['user_ip_address']);
        $user_q->execute();

        // users data send to site owner through email also

        $html = "<table><tr><td>Name</td><td>$frm_data[name]</td></tr><tr><td>Email</td><td>$frm_data[email]</td></tr><tr><td>Mobile</td><td>$frm_data[subject]</td></tr><tr><td>Message</td><td>$frm_data[message]</td></tr></table>";

        include('smtp/PHPMailerAutoload.php');
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "shubhamkumar291291@gmail.com";
        $mail->Password = "eptbcjjbspcqaqsw";
        $mail->SetFrom("shubhamkumar291291@gmail.com");
        $mail->addAddress("shubhamkumar291291@gmail.com"); // It will send the data to site owner if we want to send data to the user just remove eamil and paste the $frm_data[email]
        $mail->IsHTML(true);
        $mail->Subject = "New Contact Us";
        $mail->Body = $html;
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        if ($mail->send()) {
            // echo "Mail send";
        } else {
            // echo "Error occur";
        }

         
        if ($user_q) {
            ?>
                <script>
                    alert("Data is inserted successfully");
                    window.location.href = 'index.php';
                </script>
    
            <?php
            } else {
                ?>
                <script>
                    alert("Something wrong, server down!")
                    window.location.href = 'index.php';
                </script>
             <?php
            }
    }
    ?>