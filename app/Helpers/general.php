<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

if (!function_exists('count_unicode_words')) {
    /**
     * The function to count words in Unicode  strings.
     *
     * First remove all the punctuation marks & digits,
     * Then replace all the whitespaces (tabs, new lines, multiple spaces) by single space,
     * The words are now separated by single spaces and can be splitted to an array,
     * I have included \n\r\t here as well, but only space will also suffice,
     * Now we can get the word count by counting array elements.
     *
     * @see https://gist.github.com/abhineetmittal/d250083def7c356bbf161ff74444ebcc
     * @param $unicode_string
     * @return int
     */
    function count_unicode_words($unicode_string)
    {
        $unicode_string = preg_replace('/[[:punct:][:digit:]]/', '', $unicode_string);
        $unicode_string = preg_replace('/[[:space:]]/', ' ', $unicode_string);
        $words_array = preg_split("/[\n\r\t ]+/", $unicode_string, 0, PREG_SPLIT_NO_EMPTY);

        return count($words_array);
    }
}

if (!function_exists('reading_time')) {
    /**
     * Estimates the approximate time of reading a content.
     *
     * @param string $content text to calculate time of reading
     * @param bool $second calculate second or not
     * @return array|float returns minutes if $second set false, returns an array include minutes and seconds if $second set to true
     */
    function reading_time($content, $second = false)
    {
        $words = count_unicode_words(strip_tags($content));
        $minutes = floor($words / 200);
        if ($second) {
            $seconds = floor($words % 200 / (200 / 60));
            return compact('minutes', 'seconds');
        }
        return $minutes;
    }
}

if (!function_exists('words')) {
    /**
     * @param string $content The main content to reduce
     * @param int $length How many words of the content do you need?
     * @param string $end Characters to end new string.
     * @return string reduced string
     *
     */
    function words($content, $length = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($content, $length, $end);
    }
}

if (!function_exists('create_url')) {
    /**
     * Create a url from string and don't touch url.
     * @param $string
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function create_url($string)
    {
        return filter_var($string, FILTER_VALIDATE_URL) ? $string : url($string);
    }
}
if (!function_exists('generateRandomString')) {
    /**
     * generate Random String
     * @param $string
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('gravatar')) {
    /**
     * Return gravatar
     * @param $email
     * @param int $size
     * @return string
     */
    function gravatar($email, $size = 45)
    {
        return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?s=' . $size . '&d=mp';
    }
}

if (!function_exists('randEnum')) {
    /**
     * Return random enum
     */
    function randEnum($enum)
    {
        $statuses = $enum::cases();
        $values = array_column($statuses, 'value');
        $randomValue = $values[array_rand($values)];
        return ($randomValue);
    }
}

if (!function_exists('resp')) {
    /**
     * Return random enum
     */
    function resp(bool $status = true, mixed $message = null, mixed $data = null): array
    {
        return compact('status', 'message', 'data');
    }
}

if (!function_exists('createFakeFile')) {
    /**
     * Return fake file
     */
    function createFakeFile($fileName): string
    {
        $disk = 'public';
        $fileFullName = $fileName . '.txt';
        $file = tempnam(sys_get_temp_dir(), 'fake_file_');
        file_put_contents($file, $fileName);
        $file =  new UploadedFile($file, $fileFullName, 'text/plain', null, true);
        Storage::disk($disk)->putFileAs('files', $file, $fileFullName);
        return $disk . '/files/' . $fileFullName;
    }
}
