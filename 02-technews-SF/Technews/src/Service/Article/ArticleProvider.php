<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/02/2018
 * Time: 10:11
 */

namespace App\Service\Article;


use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class ArticleProvider
{
    public function getArticles(){
        try{
            $articles = Yaml::parseFile(__DIR__ . '/articles.yaml');
            return $articles['data'];
        } catch (ParseException $e) {
            printf('Unable to parse the YAML string: %s', $e->getMessage());
        }
        }
}
