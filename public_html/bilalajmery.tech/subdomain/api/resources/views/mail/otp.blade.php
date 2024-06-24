<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    .new_div{
        width: 100%;
    }
    @media(max-width: 575px){
        .new_div{
            width: 100%;
        }
    }
</style>
<body style="font-family: 'Poppins', sans-serif; box-sizing: border-box; margin: 40px 0; padding: 0; background-color: rgb(231, 231, 231);">
    <section style="display: flex; align-items: center; justify-content: center; width: 100%;">
        <div class="new_div" style="padding: 20px;  align-items: center; border-radius: 10px; margin:40px auto; background-color: rgb(255, 255, 255);">
            <!-- OTP Section -->
            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td align="center" style="padding: 20px 0;">
                        <h1 style="color: #1e3769; font-weight:800; text-align: center; font-size: 37px;">Welcome</h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 30px 0 0 0;">
                        <h2 style="margin: 0;">Hello!</h2>
                        <p style="margin:0; font-size: 13px;">Welcome to our platform, where you can shop around the world with our global collection...</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 0;"> 
                        <h4 style="margin: 10px 0 0 0;">Here is your OTP</h4>
                        <div style="display:flex;margin-top:5px">
                            <div style="width: 100px">
                                <p style="margin: 0; font-size: 13px;">OTP</p>
                            </div>
                            <div>
                                <p style="margin: 0; font-size: 17px;color:#000;">{{ $detail['otp'] }}</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="start" style="padding: 20px 0px; font-size: 14px;">
                        <p style="margin: 0;">Stay Connected!</p>
                        <p style="margin: 0; padding-bottom:20px;">The Team</p>
                    </td>
                </tr>
                <tr style="padding-top: 30px;">
                    <td align="center" style="padding: 10px 0; border-top: 1px solid gray;width:100%">
                        <p style="margin: 5px 0 0 0; font-size: 14px;">Thank you for using our service.</p>
                        <a href="https://example.com/" target="_blank" style="margin: 0; font-size: 14px; text-decoration: none; color:rgb(11, 1, 99)">www.example.com</a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Bottom Section with Social Media Icons -->
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" >
            <tr>
                <td align="center" style="padding: 20px 0;">
                    <a href="#" target="_blank" style="text-decoration: none; color: #1c3870; margin-right: 10px; font-size:16px;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" target="_blank" style="text-decoration: none; color: #1c3870; margin-right: 10px; font-size:16px;"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" target="_blank" style="text-decoration: none; color: #1c3870; margin-right: 10px; font-size:16px;"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" target="_blank" style="text-decoration: none; color: #1c3870; margin-right: 10px; font-size:16px;"><i class="fa-brands fa-twitter"></i></a>
                </td>
            </tr>
        </table>
    </section>
</body>
    
</html>