<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 16-Jun-17
 * Time: 1:58 AM
 */

namespace App\Utils;


use App\Models\Category;
use App\Utils\Globals\AppGlobal;

class CategoryWrapper
{
    /**
     * @return mixed
     */
    public static function getCategories()
    {
        $root = Category::root();
        $categories = $root->getDescendantsAndSelf()->toHierarchy();
        return $categories;
    }

    /**
     * @param $node
     * @return string
     */
    public static function renderNode($node) {

        $html = '<ul class="dropdown-menu dropdown-menu-right" >';

        if( $node->isLeaf() ) {
            $html .= '<li class="dropdown dropdown-submenu">' . $node->title . '</li>';
        } else {
            $html .= '<li class="dropdown dropdown-submenu">' . $node->title;

            $html .= '<ul>';

            foreach($node->children as $child)
                $html .= AppGlobal::renderNode($child);

            $html .= '</ul>';


        }

        $html .= '</ul>';

        return $html;
    }

    public static function destinations()
    {
        $destinationRoot = Category::where(array('title' => AppGlobal::DESTINATION_PARENT))->first();
        $categories = $destinationRoot->getImmediateDescendants();

        return $categories;
    }
}