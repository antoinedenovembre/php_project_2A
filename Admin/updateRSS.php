<?php
    include '../Config/config.php';
    include '../DAL/Connection.php';
    include '../DAL/FeedsGateway.php';
    include '../DAL/NewsGateway.php';

    global $dsn, $user, $pass;
    while(true) {
        try {
            $feeds = (new FeedsGateway(new Connection($dsn, $user, $pass)))->selectAllFeeds();
            $news = new NewsGateway(new Connection($dsn, $user, $pass));

            foreach ($feeds as $feed) {
                $xml = new SimpleXMLElement($feed, dataIsURL: true);
                $website = $xml->channel;
                $webUrl = $website->link;

                if (!$news->findWebSiteByUrl($webUrl)) {
                    $fr = $website->langage == 'fr';
                    $news->insertWebSite($webUrl, $website->title, $fr, $feed);
                }

                foreach ($website->item as $item) {
                    if (!$news->findNewsByUrl($item->link)) {
                        if (($date = $item->pubDate) === null) {
                            $date = $item->children('http://purl.org/dc/elements/1.1/');
                        }
                        $date = date('Y-m-d', strtotime($date));
                        $desc = html_entity_decode($item->description);

                        $news->insertNews($item->link, $item->title, $desc, $date, $webUrl);
                    }
                }
            }

            $feeds = null;
            sleep(900);
        } catch (Exception $e) {
            echo $e->getMessage();
            sleep(300);
        }
    }