<?
class Database {
    private $conn;
    
    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function getRoomsWithHighCeilings() {
        $sql = "SELECT room.number, room.width, room.length, world_sides.height, room.type, room.purpose, build.build_location 
                FROM room 
                JOIN room_location ON room.id_room = room_location.id_room_location 
                JOIN build ON room.build_id_room = build.id_build 
                JOIN world_sides ON room_location.id_w_sides_location = world_sides.id_w_sides 
                JOIN school_room ON room.id_room = school_room.room_id_school 
                JOIN school ON school_room.school_id_school_room = school.id_school 
                JOIN faculty ON school.id_faculty_school = faculty.id_faculty 
                WHERE world_sides.height > 3 
                AND build.build_location = 'Советский, 8' 
                AND faculty.faculty_name = 'ИИТ'";
        return $this->executeQuery($sql);
    }
    
    public function getLaboratories() {
        $sql = "SELECT room.number, room.width, room.length, world_sides.height, room.type, room.purpose, build.build_location 
                FROM room 
                JOIN room_location ON room.id_room = room_location.id_room_location 
                JOIN build ON room.build_id_room = build.id_build 
                JOIN world_sides ON room_location.id_w_sides_location = world_sides.id_w_sides 
                JOIN school_room ON room.id_room = school_room.room_id_school 
                JOIN school ON school_room.school_id_school_room = school.id_school 
                JOIN faculty ON school.id_faculty_school = faculty.id_faculty 
                WHERE room.type LIKE '%Лаборатория%' 
                AND build.build_location = 'Победы 12' 
                AND faculty.faculty_name = 'Строители' 
                AND room.number BETWEEN 202 AND 215 
                AND (room.width * room.length * world_sides.height) = 50";
        return $this->executeQuery($sql);
    }
    
    private function executeQuery($sql) {
        $result = $this->conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
}