<?php
include 'data.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>My News Site</title>
  <style>
    body { font-family: Arial; margin: 0; padding: 0; background: #f4f4f4; }
    header { background: #cc0000; color: #fff; padding: 20px; text-align: center; }
    nav { background: #222; padding: 10px; text-align: center; }
    nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
    .container { padding: 20px; }
    .featured { background: white; padding: 20px; margin-bottom: 20px; border-radius: 10px; }
    .article-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
    .article { background: white; border-radius: 10px; overflow: hidden; cursor: pointer; }
    .article img { width: 100%; height: 150px; object-fit: cover; }
    .article h3 { margin: 10px; }
    @media (max-width: 768px) {
      nav a { display: block; margin: 10px 0; }
    }
  </style>
  <script>
    function goToArticle(id) {
      window.location.href = 'article.php?id=' + id;
    }
    function goToCategory(cat) {
      window.location.href = 'category.php?cat=' + cat;
    }
  </script>
</head>
<body>

<header>
  <h1>MyNews</h1>
  <p>Stay Informed. Stay Ahead.</p>
</header>

<nav>
  <a href="#" onclick="goToCategory('World')">World</a>
  <a href="#" onclick="goToCategory('Sports')">Sports</a>
  <a href="#" onclick="goToCategory('Tech')">Technology</a>
  <a href="#" onclick="goToCategory('Entertainment')">Entertainment</a>
</nav>

<div class="container">
  <div class="featured">
    <h2>Featured: <?= $news[0]['title'] ?></h2>
    <img src="<?= $news[0]['image'] ?>" style="width:100%; max-height:300px; object-fit:cover;">
    <p><?= substr($news[0]['content'], 0, 150) ?>...</p>
    <button onclick="goToArticle(<?= $news[0]['id'] ?>)">Read More</button>
  </div>

  <h2>Latest Articles</h2>
  <div class="article-list">
    <?php foreach(array_slice($news, 1) as $item): ?>
      <div class="article" onclick="goToArticle(<?= $item['id'] ?>)">
        <img src="<?= $item['image'] ?>" alt="">
        <h3><?= $item['title'] ?></h3>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
