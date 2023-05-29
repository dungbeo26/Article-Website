class ArticleController {
  private $articleService;

  public function __construct($articleService) {
    $this->articleService = $articleService;
  }

  public function createArticle($title, $content, $author, $published_date) {
    if ($this->articleService->createArticle($title, $content, $author, $published_date)) {
      // Redirect or display success message
    } else {
      // Display error message
    }
  }

  public function showArticle($articleId) {
    $article = $this->articleService->getArticle($articleId);
    // Display article information in the corresponding view
  }

  public function updateArticle($articleId, $title, $content, $author, $published_date) {
    if ($this->articleService->updateArticle($articleId, $title, $content, $author, $published_date)) {
      // Redirect or display success message
    } else {
      // Display error message
    }
  }

  public function deleteArticle($articleId) {
    if ($this->articleService->deleteArticle($articleId)) {
      // Redirect or display success message
    } else {
      // Display error message
    }
  }

  public function listArticles() {
    $articles = $this->articleService->getAllArticles();
    // Display list of articles in the corresponding view
  }
}
