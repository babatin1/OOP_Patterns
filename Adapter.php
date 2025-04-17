<?php

interface DataSource {
    public function readData();
}

class FileDataSource implements DataSource {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function readData() {
        return file_get_contents($this->filePath);
    }
}

class DatabaseDataSource {
    private $connectionString;

    public function __construct($connectionString) {
        $this->connectionString = $connectionString;
    }

    public function fetchData() {
    
        return "Данные из базы данных";
    }
}

class DatabaseAdapter implements DataSource {
    private $databaseDataSource;

    public function __construct(DatabaseDataSource $databaseDataSource) {
        $this->databaseDataSource = $databaseDataSource;
    }

    public function readData() {
        return $this->databaseDataSource->fetchData();
    }
}

$fileSource = new FileDataSource("data.txt");
echo $fileSource->readData();

$databaseSource = new DatabaseDataSource("database_connection_string");
$databaseAdapter = new DatabaseAdapter($databaseSource);
echo $databaseAdapter->readData();

?>