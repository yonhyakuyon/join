<?
class RoomDisplay {
    public static function displayRooms($rooms) {
        foreach ($rooms as $row) {
            echo "Номер: " . htmlspecialchars($row['number']) . "<br>";
            echo "Размер: " . htmlspecialchars($row['width']) . "x" . htmlspecialchars($row['length']) . "x" . htmlspecialchars($row['height']) . "<br>";
            echo "Тип: " . htmlspecialchars($row['type']) . "<br>";
            echo "Назначение: " . htmlspecialchars($row['purpose']) . "<br>";
            echo "Корпус: " . htmlspecialchars($row['build_location']) . "<br><br>";
        }
    }
}