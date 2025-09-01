<?php
include 'data.php';
$cat = $_GET['cat'] ?? 'World';
$filtered = array_filter($news, fn($n) => $n['category'] == $cat);
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $cat ?> News</title>
  <style>
    body { font-family: Arial; background: #f0f0f0; margin: 0; }
    header { background: #cc0000; color: white; text-align: center; padding: 20px; }
    .container { padding: 20px; }
    .article { background: white; padding: 10px; margin-bottom: 10px; border-radius: 10px; cursor: pointer; }
    .article img { width: 100%; height: 200px; object-fit: cover; }
  </style>
  <script>
    function goToArticle(id) {
      window.location.href = 'article.php?id=' + id;
    }
  </script>
</head>
<body>
  <header>
    <h1><?= $cat ?> News</h1>
  </header>
  <div class="container">
    <?php foreach($filtered as $n): ?>
      <div class="article" onclick="goToArticle(<?= $n['id'] ?>)">
        <img src="<?= $n['image'] ?>">
        <h2><?= $n['title'] ?></h2>
        <p><?= substr($n['content'], 0, 100) ?>...</p>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
