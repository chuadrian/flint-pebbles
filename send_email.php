<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    $name = trim($data['name']);

    if ($email && $name) {
        $to = $email;
        $subject = "Welcome to Flint & Pebbles Ventures";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";
        $headers .= "From: Flint & Pebbles <no-reply@flintandpebbles.com>\r\n";

        $message = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Email</title>
    <style>
        body {
            background-color: #fafafa;
            font-family: \'Oswald\', sans-serif;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #fafafa;
            padding-bottom: 40px;
        }
        .webkit {
            max-width: 600px;
            background-color: #ffffff;
        }
        .outer {
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: \'Oswald\', sans-serif;
            color: #4a4a4a;
        }
        .header {
            background-color: #cfe2f3;
            text-align: center;
            padding: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
        }
        .footer {
            background-color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .button {
            background-color: #cfe2f3;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
        }
        img {
            border: 0;
            -ms-interpolation-mode: bicubic;
        }
        @media screen and (max-width: 630px) {
            .webkit {
                max-width: 100% !important;
            }
            .outer {
                width: 100% !important;
                padding: 0 10px !important;
            }
            .header,
            .content,
            .footer {
                padding: 10px !important;
            }
            h1 {
                font-size: 24px !important;
            }
            p,
            ul {
                font-size: 14px !important;
            }
            .button {
                padding: 10px !important;
                font-size: 14px !important;
            }
            img.adapt-img {
                width: 100% !important;
                height: auto !important;
            }
        }
    </style>
</head>
<body>
    <center class="wrapper">
        <div class="webkit">
            <table class="outer" align="center">
                <tr>
                    <td class="header">
                        <img src="https://ehmaeci.stripocdn.email/content/guids/CABINET_43124ffcaedeadd47cf9301b0795a71ff3acc6f3bc5ce189ff9c5a3ca72f97fd/images/image_YeF.jpeg" alt="Logo" width="98">
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <table width="100%">
                            <tr>
                                <td align="center" class="esd-block-image" style="font-size: 0px;">
                                    <a target="_blank">
                                        <img class="adapt-img" src="https://ehmaeci.stripocdn.email/content/guids/CABINET_43124ffcaedeadd47cf9301b0795a71ff3acc6f3bc5ce189ff9c5a3ca72f97fd/images/undraw_welcome_re_h3d9.png" alt="" style="display:block" width="600">
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <h1>WELCOME TO FLINT & PEBBLES VENTURES</h1>
                        <p>Welcome to Flint & Pebbles! We\'re delighted to have you as part of our family.</p>
                        <p>At Flint & Pebbles, we believe that a good night\'s sleep is the foundation of a happy and healthy life. That\'s why we\'re dedicated to providing you with the highest quality mattresses that ensure comfort, support, and relaxation.</p>
                        <ul>
                            <li><strong>Exclusive Offers:</strong> Be the first to know about our special promotions, discounts, and sales.</li>
                            <li><strong>Expert Advice:</strong> Get tips and recommendations from our sleep specialists to help you choose the perfect mattress.</li>
                            <li><strong>Seamless Shopping Experience:</strong> Enjoy fast delivery, and exceptional customer service.</li>
                        </ul>
                        <p>Thank you for choosing Flint & Pebbles. We look forward to helping you achieve the restful nights you deserve.</p>
                        <p>Sweet dreams,</p>
                        <p>Kemi Chima<br>Flint & Pebbles CEO<br><br>0909 360 8301<br>[Website URL]</p>
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        <h2 style="color: #0b315e;">HAVE A QUESTION?</h2>
                        <p>We are here to help you with any questions.<br>Reply to this email or contact us by clicking the button below</p>
                        <a href="tel:+2349093608301" class="button">+ 234 909 360 8301</a>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>
</html>';

        if (mail($to, $subject, $message, $headers)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
