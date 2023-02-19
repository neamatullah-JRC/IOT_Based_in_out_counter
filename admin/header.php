<html>
    <head>
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                border-radius: 50%;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e6e6e6;
                color: black; 
                text-align: center;
                font-size: 0.5rem;
            }
            .container {
                font-size: 0; /* to remove white space between inline-block elements */
            }

            .left, .right {
                display: inline-block;
                width: 50%;
                font-size: 16px; /* to reset font size */
            }

            .left {
                text-align: left;
                color:red;
                font-family: Arial;
                font-size: 3rem;            }

            .right {
                text-align: right;
                color:red;
                font-family: Arial;
                font-size: 3rem;
            }
            .blink_me {
                animation: blinker 1s linear infinite;
            }

            @keyframes blinker {
                50% {
                    opacity: 0;
                }
        </style>
    </head>


   <div class="blink_me">

 <?php
$timezone = new DateTimeZone('Asia/Dhaka');
$datetime = new DateTime('now', $timezone);
$time = $datetime->format('l  (d-m-y) H:i:s');echo "<h1 class='center'>$time</h1>";
?>
 </div>

</html>