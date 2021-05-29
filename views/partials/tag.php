<?php 
    if ($tagovi){
        foreach ( $tagovi as $tag) {
            echo('<span class="tag text-white bg-info h6 mr-1 px-3">'); echo $tag; echo '</span>';
        }
    }
?>