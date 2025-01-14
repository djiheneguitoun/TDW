<?php
class Evenement {
    private $conn;
    private $table_name = "Evenements";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUpcomingEvents() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE date_debut > CURDATE()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registerBenevole($membre_id, $evenement_id) {
        // Check if the member is already registered for the event
        $checkQuery = "SELECT COUNT(*) as is_registered FROM Benevolats WHERE membre_id = :membre_id AND evenement_id = :evenement_id";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(':membre_id', $membre_id);
        $checkStmt->bindParam(':evenement_id', $evenement_id);
        $checkStmt->execute();
        $isRegistered = $checkStmt->fetch(PDO::FETCH_ASSOC)['is_registered'];

        if ($isRegistered > 0) {
            return false; // Member is already registered
        }

        // Check if the maximum number of volunteers has been reached
        $eventQuery = "SELECT nb_benevolat, nb_benevolat_max FROM Evenements WHERE evenement_id = :evenement_id";
        $eventStmt = $this->conn->prepare($eventQuery);
        $eventStmt->bindParam(':evenement_id', $evenement_id);
        $eventStmt->execute();
        $event = $eventStmt->fetch(PDO::FETCH_ASSOC);

        if ($event['nb_benevolat'] < $event['nb_benevolat_max']) {
            // Increment the number of volunteers
            $updateQuery = "UPDATE Evenements SET nb_benevolat = nb_benevolat + 1 WHERE evenement_id = :evenement_id";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bindParam(':evenement_id', $evenement_id);
            $updateStmt->execute();

            // Insert the volunteer registration
            $insertQuery = "INSERT INTO Benevolats (membre_id, evenement_id, date_inscription) VALUES (:membre_id, :evenement_id, CURDATE())";
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bindParam(':membre_id', $membre_id);
            $insertStmt->bindParam(':evenement_id', $evenement_id);
            return $insertStmt->execute();
        } else {
            return false; // Maximum number of volunteers reached
        }
    }

    public function isMemberRegistered($membre_id, $evenement_id) {
        $query = "SELECT COUNT(*) as is_registered FROM Benevolats WHERE membre_id = :membre_id AND evenement_id = :evenement_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':membre_id', $membre_id);
        $stmt->bindParam(':evenement_id', $evenement_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['is_registered'] > 0;
    }
}
