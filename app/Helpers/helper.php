<?php

use App\Models\Genre;

function getGenres()
    {
        return Genre::orderby('name', 'ASC')->where('status', 1)->get();
    }

?>
