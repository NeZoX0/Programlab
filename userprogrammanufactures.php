<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Користувачі - Програми - Виробникі</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="bd.php"><h2>Головна</h2></a>
	<center>
	<Div name = contents CLASS = "contents" > <h1>Звіт: Користувачі - Програми - Виробникі</h1> <Div/>
	</center>

    <?php

    $mysqli = new mysqli('localhost', 'root', '', 'proga'); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
    $mysqli->set_charset("utf8"); // Встановлюємо кодування utf8
    
    if (mysqli_connect_errno()) {
    printf("Підключення до сервера не вдалось. Код помилки: %s\n", mysqli_connect_error());
    exit;
    }

    /* Надсилаємо запит серверу */
    if($result = $mysqli->query('SELECT * FROM user')) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит

        printf("<h3>Звіт - Список Корстувачів:</h3>");   // <br> в html - розрив рядка
        printf("<table><tr><th>ІД</th><th>П.І.Б</th><th>Банковська карта</th><th>Дата народження</th><th>Місце навчання</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row['id'], $row['pib'], $row['bank_card'], $row['date_of_birthday'],$row['educational_institution']); //виводимо результат на сторінку
        };
        printf("</table>");
		echo "<a href='tableuser.php'><h4>Редагувати Користувачів</h4></a><br>";

        /*Звільняємо пам'ять*/
        $result->close();
    }
	if($result = $mysqli->query('SELECT * FROM program')) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит

        printf("<h3>Звіт - Список Програм: </h3>");   // <br> в html - розрив рядка
        printf("<table><tr><th>ІД</th><th>Ім'я</th><th>Опис</th><th>Розмір</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row['id'], $row['name'], $row['opys'], $row['size']); //виводимо результат на сторінку
        };
        printf("</table>");
		echo "<a href='tableprogram.php'><h4>Редагувати Програми</h4></a><br>";
        /*Звільняємо пам'ять*/
        $result->close();
    }
	if($result = $mysqli->query('SELECT * FROM manufacturer')) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит

        printf("<h3>Звіт - Список Виробників: </h3>");   // <br> в html - розрив рядка
        printf("<table><tr><th>Код</th><th>Ім'я Компанії</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr><td>%s</td><td>%s</td></tr>", $row['code'], $row['name_company']); //виводимо результат на сторінку
        };
        printf("</table>");
		echo "<a href='tablemanufactures.php'><h4>Редагувати Виробників</h4></a><br>";
        /*Звільняємо пам'ять*/
        $result->close();
    /*Закриваємо з'єднання*/
    $mysqli->close();
	}
    ?>
</body>
</html>
