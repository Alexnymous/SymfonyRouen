<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20/02/2018
 * Time: 09:58
 */

namespace App\Service\Article;
use Symfony\Component\Yaml\Yaml;

class ArticleProvider
{
    /*
     * Recupère, parse et retourne les articles
     * depuis articles.yaml
     */
    public function getArticles() {

        try {
            $articles = Yaml::parseFile(__DIR__ . '/articles.yaml');
            return $articles['data'];
        } catch (ParseException $e) {
            printf('Unable to parse the YAML string: %s', $e->getMessage());
        }

    }
}