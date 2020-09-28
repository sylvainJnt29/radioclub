<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('truncate', [$this, 'truncate']),
        ];
    }

    public function truncate($string)
    {
        $chars = [];
        $new_string = '';
        $max = (strlen($string) > 25) ? 25 : strlen($string);
        for($i = 0; $i < $max; $i++){
            $chars[] = $string[$i];
        }
        foreach($chars as $char){
            $new_string .= $char;
        }
            
        $new_string .= '...' ;
        return $new_string;
    }

    // public function linkTruncateArticle()
    // {
    //     if (truncate){
    //         <a href="{{path('detailed_article')}}"></a>
    //     }
    // }
}
?>