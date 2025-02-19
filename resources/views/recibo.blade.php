<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento A4 Horizontal</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }
        body {
            width: 297mm;
            height: 210mm;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
            background: white;
        }
        .page {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: relative;
            padding: 20mm;
        }
        .side-bar {
            position: absolute;
            left: 0;
            top: 0;
            width: 30mm;
            height: 100%;
            background: blue;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);
        }
        .side-bar.right {
            left: auto;
            right: 0;
            clip-path: polygon(20% 0, 100% 0, 100% 100%, 0 100%);
        }
        .content {
            position: relative;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .content span {
            color: red;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="side-bar"></div>
        <div class="content">Farmácia <span>Algrave</span></div>
        <div class="side-bar right"></div>
    </div>
</body>
</html>
