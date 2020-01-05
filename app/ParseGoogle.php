<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParseGoogle extends Model
{
    public static function getPage($word, $dom)
    {
        $cookiefile = 'cookie.txt';
        //$word = 'кролики';
        $fp = fopen ("parse.txt", "w");
        //$fp1 = fopen ("header.txt", "w");
        $today = date("Y-m-d H:i:s"); 
            
        for ( $number = 0; $number < 10; $number=$number+10)
        {

            $URL_link = "http://www.google.ru/search?q=".rawurlencode($word)."&newwindow=1&client=opera&rls=ru&channel=suggest&ie=UTF-8&oe=UTF-8&ei=rQzxXZmvFJKvmwWl7LHADQ&start=".rawurlencode($number)."&sa=N";

            $ch = curl_init($URL_link);
            curl_setopt($ch, CURLOPT_HEADER, 0);          
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
            //curl_setopt($ch, CURLOPT_PROXY, '37.32.4.140:1085');
            //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
                    
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

            curl_setopt ($ch, CURLOPT_FILE, $fp);
                
            sleep(2);

            $html = curl_exec($ch);

            $html = file_get_contents("parse.txt");
                preg_match_all('|<div class="BNeawe vvjwJb AP7Wnd">(.*?)</div>|is', $html, $key_word);
                preg_match_all('|<div class="BNeawe UPmit AP7Wnd">(.*?)›|is', $html, $domain);
            foreach (array_slice($key_word[1], 0, 10) as $key => $item_key_word)
            {
                $id_Google = $number + $key;
                $item_domain = array_slice($domain[1], 0, 10)[$key];
                DB::insert("INSERT INTO `parse_googles`(`id_Google`,`domaine_name`,`key_word`,`word`,`Time`) VALUES (?,?,?,?,?)",[$id_Google+1, $item_domain, $item_key_word, $word, $today]);
            }
        }
        fclose ($fp);   
    }

            ////////////////////////////////////
           ////////////////////////////////////
            // $html = file_get_html(file_get_contents($URL_link));
            // $links = $html->find('a div.BNeawe vvjwJb AP7Wnd');
            // $targetLinkHref = null;
            // foreach ($links as $link) 
            // {
            //     if ($link->innertext) 
            //     {
            //         $targetLinkHref = htmlspecialchars_decode($link->href);
            //     }
            // }
            // sleep(2);
    
            // $targetLinkHref = 'http://www.google.ru'.$targetLinkHref;
    
            // curl_setopt($ch, CURLOPT_URL, $targetLinkHref);
            // curl_setopt($ch, CURLOPT_HEADER, 1);
            // curl_setopt($ch, CURLOPT_NOBODY, 1); 
            // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
            // curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
    
            // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
            // curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

            // curl_setopt ($ch, CURLOPT_FILE, $fp1);

            // $html = curl_exec($ch);
    
            // $html = file_get_contents("header.txt");
            // preg_match_all('|Location:(.*?)Expires:|is', $html, $matches);
            // foreach (array_slice($matches[1], 0, 10) as $item) 
            // {
            //     echo $item, "<br>";
            // }

        
        //curl_close($ch);
        //fclose ($fp);
}



