<?php
// Script de test pour l'upload d'image
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = __DIR__ . '/uploads/profile_images/';
    
    // Créer le répertoire s'il n'existe pas
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $file = $_FILES['image'];
    $fileName = 'test_' . time() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $targetPath = $uploadDir . $fileName;
    
    // Afficher les informations du fichier
    echo "<h3>Informations du fichier</h3>";
    echo "<pre>";
    print_r($file);
    echo "</pre>";
    
    // Tenter de déplacer le fichier
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        echo "<div style='color: green; font-weight: bold;'>Fichier téléchargé avec succès!</div>";
        echo "<p>Chemin du fichier: $targetPath</p>";
        echo "<p>URL du fichier: /uploads/profile_images/$fileName</p>";
        echo "<img src='/uploads/profile_images/$fileName' style='max-width: 300px;' />";
    } else {
        echo "<div style='color: red; font-weight: bold;'>Erreur lors du téléchargement du fichier.</div>";
        echo "<p>Code d'erreur: " . $file['error'] . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test d'upload d'image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #4f46e5;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>
    <h1>Test d'upload d'image</h1>
    
    <form method="post" enctype="multipart/form-data">
        <h3>Sélectionnez une image à télécharger</h3>
        <input type="file" name="image" accept="image/*" required>
        <br><br>
        <button type="submit">Télécharger</button>
    </form>
    
    <div>
        <h3>Informations système</h3>
        <p>Répertoire d'upload: <?php echo __DIR__ . '/uploads/profile_images/'; ?></p>
        <p>Le répertoire existe: <?php echo file_exists(__DIR__ . '/uploads/profile_images/') ? 'Oui' : 'Non'; ?></p>
        <p>Le répertoire est accessible en écriture: <?php echo is_writable(__DIR__ . '/uploads/profile_images/') ? 'Oui' : 'Non'; ?></p>
        <p>Taille maximale de téléchargement: <?php echo ini_get('upload_max_filesize'); ?></p>
        <p>Taille maximale de POST: <?php echo ini_get('post_max_size'); ?></p>
    </div>
</body>
</html>
