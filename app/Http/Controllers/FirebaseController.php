<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Kreait\Firebase;
//use Kreait\Firebase\Factory;
//use Kreait\Firebase\ServiceAccount;
//use Kreait\Firebase\Database;


class FirebaseController extends Controller
{
    const DEFAULT_URL = 'https://laravelforfirebase.firebaseio.com/';
    const DEFAULT_TOKEN = 'ns5t4Z2nMmgwmMVysDU13gL6bGydO4BWpQFW3uIT';
    const DEFAULT_PATH = '/SEN0161/PH';
    public function index()
    {
//        $test = [
//            'foo' => 'bar',
//            'i_love' => 'lamp',
//            'id' => 42
//        ];
//        $dateTime = new \DateTime();
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
//        $firebase->set(self::DEFAULT_PATH. '/' . $dateTime->format('c'), $test);
//        $firebase->set(self::DEFAULT_PATH . '/name/contact001', 'John Doe');
        $name = json_decode($firebase->get(self::DEFAULT_PATH ));
        //$value= $firebase ->get($path);
//        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelforfirebase.json');
//        $firebase = (new Factory)
//            ->withServiceAccount($serviceAccount)
//            ->withDatabaseUri('https://laravelforfirebase.firebaseio.com/')
//            ->create();
//
//
//        $database = $firebase->getDatabase();
//
//        $newPost = $database
//            ->getReference('blog/kos')
//            ->push([
//                'title' => 'Laravel FireBase Tutorial Part 2' ,
//                'category' => 'Laravel'
//            ]);
//        print_r($newPost->getvalue());

    }
}
