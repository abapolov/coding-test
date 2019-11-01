<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class AppExtension
 *
 * @package App\Twig
 */
class AppExtension extends AbstractExtension
{
    /**
     * @return array|\Twig_Filter[]
     */
    public function getFilters()
    {
        return [
            new TwigFilter('highlight', [ $this, 'highlight' ])
        ];
    }

    /**
     * @param string      $word
     * @param string|null $search
     *
     * @return mixed
     * ToDo: Change highlight layout
     */
    public function highlight(?string $word, ?string $search)
    {
        $highlight = [];

        if (!is_array($search)) {
            $search = [ $search ];
        }

        foreach ($search as $term) {
            $highlight[] = '<span class="highlight" style="background: yellow">' . $term . '</span>';
        }

        return str_ireplace($search, $highlight, $word);
    }
}