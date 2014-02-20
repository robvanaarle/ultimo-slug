<?php

namespace ultimo\util\string;

class Slug {
  /**
   * Slugifies a string by removing character decoration, replacing spaces with
   * '-' and removed other unsupported characters.
   * @param string $text Text to slugify.
   * @return string Slugified text.
   */
  static public function slugify($text) {
    // based on symfony's jobeet tutorial.
    
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    return $text;
  }
}
