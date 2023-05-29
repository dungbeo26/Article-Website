$database_host = 'localhost';
$database_name = 'your_database_name';
$database_username = 'your_username';
$database_password = 'your_password';

try {
  $conn = new PDO('mysql:host=' . $database_host . ';dbname=' . $database_name, $database_username, $database_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $article = new Article($conn);

  // Ví dụ sử dụng phương thức create() để tạo một bài viết mới
  $article->title = 'Sample Article';
  $article->content = 'This is a sample article.';
  $article->author = 'John Doe';
  $article->published_date = '2023-05-18';

  if ($article->create()) {
    echo 'Article created successfully.';
  } else {
    echo 'Unable to create article.';
  }

  // Ví dụ sử dụng phương thức read() để đọc danh sách các bài viết
  $result = $article->read();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo 'ID: ' . $row['id'] . '<
