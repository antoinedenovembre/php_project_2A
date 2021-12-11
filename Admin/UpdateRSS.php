<?php
    include '../Config/config.php';
    include '../DAL/Connection.php';
    include '../DAL/FeedsGateway.php';
    include '../DAL/NewsGateway.php';

    global $dsn, $user, $pass;
    while(true) {
        $feeds = (new FeedsGateway(new Connection($dsn, $user, $pass)))->selectAllFeeds();

        foreach($feeds as $feed) {
            $xml = new SimpleXMLElement($feed, dataIsURL: true);
            $website = $xml->channel;

//            echo $website->title, " ", $website->link, " ", $website->description, "\n";

            foreach ($website->item as $item) {
                $date = $item->children('http://purl.org/dc/elements/1.1/');
//                echo $item->title, " ", $item->link, " ", $item->description, " ", $date, "\n\n";
            }
        }

        $feeds = null;
        sleep(900);
    }