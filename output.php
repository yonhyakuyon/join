<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список аудиторий</title>
</head>

<body>
    <h3>Аудитории с потолками выше 3 метров, Советский 8, ИИТ кафедры</h3>
    <?
    RoomDisplay::displayRooms($rooms1);
    ?>
    <h3>Лаборатории на Победы 12, кафедры строителей (номера 202-215, объем 50)</h3>
    <?
    RoomDisplay::displayRooms( $rooms2);
    ?>
</body>

</html>