<?php
class Dao
{
    private mysqli $connection;

    public function __construct(string $user, string $password, string $database)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->connection = new mysqli('localhost', $user, $password, $database);
        $this->connection->set_charset('utf8mb4');
    }

    public function query(string $sql): mysqli_result
    {
        return $this->connection->query($sql);
    }

    public function table(mysqli_result $result, string $header): string
    {
        $html = '<h2>' . htmlspecialchars($header, ENT_QUOTES, 'UTF-8') . '</h2>';
        $html .= '<div class="table-wrap"><table><thead><tr>';

        foreach ($result->fetch_fields() as $field) {
            $html .= '<th scope="col">' . htmlspecialchars($field->name, ENT_QUOTES, 'UTF-8') . '</th>';
        }

        $html .= '</tr></thead><tbody>';
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>';
            foreach ($row as $value) {
                $html .= '<td>' . htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') . '</td>';
            }
            $html .= '</tr>';
        }

        return $html . '</tbody></table></div>';
    }
}
