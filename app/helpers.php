<?php
// app/helpers.php

if (!function_exists('filter_profanity')) {
    function filter_profanity($text)
    {
        // Retrieve the list of bad words from the config
        $badWords = config('profanity.bad_words');

        foreach ($badWords as $word) {
            // Use regex to perform case-insensitive replacement
            // \b ensures matching whole words
            $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
            $replacement = str_repeat('*', strlen($word));

            $text = preg_replace($pattern, $replacement, $text);
        }

        return $text;
    }
}
