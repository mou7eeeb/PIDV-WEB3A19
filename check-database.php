<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config/bootstrap.php';

use Doctrine\DBAL\DriverManager;
use Symfony\Component\Dotenv\Dotenv;

// Charger les variables d'environnement
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// Récupérer la configuration de la base de données depuis DATABASE_URL
$dbUrl = $_ENV['DATABASE_URL'];
echo "Connexion à la base de données: $dbUrl\n\n";

try {
    // Configurer la connexion à la base de données
    $connectionParams = [
        'url' => $dbUrl,
    ];
    
    $connection = DriverManager::getConnection($connectionParams);
    echo "Connexion à la base de données réussie!\n\n";
    
    // Vérifier si la base de données existe
    $dbName = $connection->getDatabase();
    echo "Base de données: $dbName\n\n";
    
    // Lister toutes les tables
    $tables = $connection->createSchemaManager()->listTableNames();
    
    if (count($tables) > 0) {
        echo "Tables dans la base de données:\n";
        foreach ($tables as $table) {
            echo "- $table\n";
            
            // Afficher la structure de chaque table
            $columns = $connection->createSchemaManager()->listTableColumns($table);
            echo "  Colonnes:\n";
            foreach ($columns as $column) {
                $type = $column->getType()->getName();
                $nullable = $column->getNotnull() ? 'NOT NULL' : 'NULL';
                echo "    - {$column->getName()} ({$type}) {$nullable}\n";
            }
            echo "\n";
        }
    } else {
        echo "Aucune table trouvée dans la base de données.\n";
    }
    
} catch (\Exception $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage() . "\n";
}
