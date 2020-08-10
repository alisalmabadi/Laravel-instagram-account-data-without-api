<?php


if (!function_exists('getDetails')) {

function getDetails($pageUrl) {
        $url = $pageUrl;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);

        $output;
        $metaPos = strpos($result, "<meta content=");
        if($metaPos != false)
        {
            $meta = substr($result ,$metaPos,70);

            //meghdare followers
            $followerPos = strpos($meta , "Followers");
            $followers = substr($meta , 15 , $followerPos-15);
            $output[0] = $followers;

            //meghdare followings
            // $commaPos = strpos($meta , ',');
            $followingPos = strpos($meta, 'Following');
            $followings = substr($meta , $followerPos+10 , $followingPos - ($followerPos+10));
            $output[1] = $followings;


            //meghdare posts
            $seccondCommaPos = $followingPos + 10;
            $postsPos = strpos($meta, 'Post');
            $posts = substr($meta, $seccondCommaPos , $postsPos - $seccondCommaPos);
            $output[2] = $posts;
            
              //image finder
                $imgPos = strpos($result, "og:image");
                $image = substr($result , $imgPos+19 , 200);
                $endimgPos = strpos($image, "/>");
                $finalImagePos = substr($result, $imgPos+19 , $endimgPos-2);
                $output[3] = $finalImagePos;

            return $output;
        }
        else
        {
            return null;
        }
    }
}