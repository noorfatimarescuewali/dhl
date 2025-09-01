<?php
include 'data.php';
$id = $_GET['id'] ?? 1;
$article = null;
foreach ($news as $n) {
  if ($n['id'] == $id) {
    $article = $n;
    break;
  }
}
if (!$article) die("Article not found!");
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $article['title'] ?></title>
  <style>
    body { font-family: Arial; background: #fff; margin: 0; }
    header { background: #cc0000; color: white; padding: 20px; text-align: center; }
    .container { padding: 20px; max-width: 800px; margin: auto; }
    img { width: 100%; height: auto; border-radius: 10px; }
    .comments { margin-top: 40px; }
    textarea { width: 100%; height: 80px; }
  </style>
</head>
<body>
  <header>
    <h1><?= $article['title'] ?></h1>
  </header>
  <div class="container">
    <img src="<?= $article['image'] ?>">
    <p><?= $article['content'] ?></p>

    <div class="comments">
      <h3>Leave a Comment</h3>
      <textarea placeholder="Write your comment..."></textarea><br><br>
      <button onclick="alert('Comment submitted!')">Submit</button>
    </div>
  </div>
</body>
</html>
