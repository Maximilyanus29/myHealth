<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мое здоровье</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .service-link {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            text-decoration: none;
            color: #333;
            text-align: center;
            min-height: 150px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .service-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        @media (max-width: 480px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <h1>Мониторинг здоровья</h1>
    <div class="grid-container">
        <a href="mvp/index.html" class="service-link">
            <div>Моё здоровье</div>
        </a>
        <a href="recipes.php" class="service-link">
            <div>Моё питание</div>
        </a>
        <a href="#" class="service-link">
            <div>Мой сон</div>
        </a>
        <a href="#" class="service-link">
            <div>Моё психическое здоровье</div>
        </a>
    </div>
</body>
</html>
