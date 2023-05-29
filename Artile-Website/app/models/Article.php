class Article {
  private $conn;
  private $table = 'articles';

  public $id;
  public $title;
  public $content;
  public $author;
  public $published_date;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function create() {
    $query = 'INSERT INTO ' . $this->table . ' 
              SET
                title = :title,
                content = :content,
                author = :author,
                published_date = :published_date';

    $stmt = $this->conn->prepare($query);

    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->published_date = htmlspecialchars(strip_tags($this->published_date));

    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':author', $this->author);
    $stmt->bindParam(':published_date', $this->published_date);

    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function read() {
    $query = 'SELECT * FROM ' . $this->table;

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
  }

  // Các phương thức khác liên quan đến việc quản lý và thao tác với bài viết
}
