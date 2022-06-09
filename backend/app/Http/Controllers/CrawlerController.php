<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use DOMDocument;
use File;
use Response;

class CrawlerController extends Controller
{
    private $xml;
    private $url;

    function crawlerAction(Request $request) {

        $data = $request->json()->all();
        $this->url = $data['url'];
        $this->parserUrl($this->url);

        return response()->json([
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'screenshot' => $this->getScreenshot()
        ]);
    }

    function crawlerImage($filename) {

        $path = storage_path("images/$filename");

        if (strpos($path, "/")) {
            abort(404);
        }

        if (!File::exists($path)) {
            abort(404);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    }

    function crawlerList() {
        
    }

    private function filenameFormat($filename) {
        return url('/') ."/". $filename . ".jpg";
    }

    private function getScreenshot() {

        $url = $this->url;
        $date = date("Ymd");
        $filename = sha1($date . $url);

        if (file_exists(storage_path("images/$filename.jpg"))) {
            return $this->filenameFormat($filename);
        }

        Browsershot::url($url)
            ->setOption('landscape', true)
            ->windowSize(3840, 2160)
            ->waitUntilNetworkIdle()
            ->save(storage_path("images/$filename.jpg"));

        return $this->filenameFormat($filename);
    }

    private function parserUrl($url) {
        $html = file_get_contents($url);
        $this->xml = new DOMDocument($html);
        libxml_use_internal_errors(true);
        $this->xml->validateOnParse = true;
        $this->xml->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    }

    private function getTitle() {
        return $this->xml->getElementsByTagName('title')->item('0')->nodeValue;
    }

    private function getDescription() {
        $arr = [];

        $elms = $this->xml->getElementsByTagName('meta');

        foreach($elms as $elm) {
            $name = $elm->getAttribute('name');
            
            if ($name != 'description') {
                continue;
            }    
            
            $arr[] = $elm->getAttribute('content');
        }

        return implode(", ", $arr);
    }
}
