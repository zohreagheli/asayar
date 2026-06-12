<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تماس با ما</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        /* دکمه تماس */
        .btn-contact {
            background: #5e42a6;
            color: white;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            border: none;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn-contact:hover {
            background: #472c91;
        }

        /* پنجره modal */
        .contact-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-in-out;
        }

        .contact-modal-content {
            background-color: #fff;
            padding: 30px 20px;
            border-radius: 12px;
            text-align: center;
            width: 320px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.25);
            position: relative;
            animation: slideDown 0.3s ease-in-out;
        }

        .contact-modal-content h4 {
            margin-top: 0;
            color: #5e42a6;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            color: #333;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #5e42a6;
        }

        #copyBtn {
            margin-top: 15px;
            padding: 8px 18px;
            border: none;
            border-radius: 6px;
            background-color: #5e42a6;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        #copyBtn:hover {
            background-color: #472c91;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes slideDown {
            from {transform: translateY(-20px); opacity: 0;}
            to {transform: translateY(0); opacity: 1;}
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

    </style>
</head>
<body>
   

</body>
</html>
