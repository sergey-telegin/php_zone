<?php

namespace App\MyProject\Controllers;

use App\MyProject\Services\Db;
use App\MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }

    public function view(int $articleId)
    {
        $result = $this->db->queryFetchAll(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId]
        );

        if ($result === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $author = $this->db->queryFetchAll('SELECT nickname FROM users WHERE id = "' . $result[0]['author_id'] . '"');


        $this->view->renderHtml('articles/view.php', ['article' => $result[0], 'author' => $author[0][0]]);

    }

}