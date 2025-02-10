<?php
class Controller{
    public function model($model)
    {
        if(file_exists(_DIR_ROOT . '/app/models/'.$model.'.php'))
        {
            require_once (_DIR_ROOT . '/app/models/'.$model.'.php');
            if(class_exists($model))
            {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public function render($view,$data=[])
    {
        
        extract($data); // đổi key của mảng thành biến
        if(file_exists(_DIR_ROOT . '/app/views/'.$view.'.php'))
        {
            require_once (_DIR_ROOT . '/app/views/'.$view.'.php');

        }
    }
    function character_limiter($text, $limit, $ending =true) {
        // Remove any HTML tag in the string.
        //  $text = preg_replace("/<a[^>]+\>(<img[^>]+\>)<\/a>/i", ' . ', $text);
        $text = strip_tags(preg_replace('/<[^>]*>/','',str_replace(array("&nbsp;","\n","\r"),"",html_entity_decode($text,ENT_QUOTES,'UTF-8'))));
    
        if (strlen($text) <= $limit) {
            return $text;
        }
        
        //find last space within length
        $last_space = strrpos(substr($text, 0, $limit), ' ');
        $trimmed_text = substr($text, 0, $last_space);
        
        //add ellipses (...)
        if ($ending) {
            $trimmed_text .= '...';
        }
        
        return $trimmed_text;
        
    }
    function generateToc($description) {
        $description = htmlspecialchars_decode($description);
        $pattern = '/<h([2-3])>(.*?)<\/h[2-3]>/i';

        $toc = [];
        $counter = 0;

        $content_with_ids = preg_replace_callback($pattern, function ($matches) use (&$toc, &$counter) {
            $level = $matches[1];
            $title = $matches[2];
            $id = 'heading-' . $counter++;

            $toc[] = [
                'level' => $level,
                'title' => $title,
                'id' => $id
            ];

            return '<h' . $level . ' id="' . $id . '">' . $title . '</h' . $level . '>';
        }, $description);

        return [
            'content' => $content_with_ids,
            'toc' => $toc
        ];
    }

    
        
        
}