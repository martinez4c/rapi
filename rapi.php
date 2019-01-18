<?php 

$url = 'https://www.saveoffline.com/process/?url=https://www.rapidvideo.com/e/'.$_GET['id'].'?q=1080&type=json';
$get = file_get_contents($url);

$json = json_decode($get);


$calidades = array(
    "480p" => $json->urls[0]->id,
    "720p" => $json->urls[1]->id,
    "1080p" => $json->urls[2]->id,
);


$files = '';
    

foreach ($calidades as $calidad => $key) {

    $files .= '{"type": "video/mp4", "label": "' . $calidad. '", "file": "' . $key . '"},';

}

$video = '[' . rtrim($files, ',') . ']';


?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>TuBlogAdictivo</title>
        <script src="https://content.jwplatform.com/libraries/kpU3q7j8.js"></script>
    </head>
    <body>
<style type="text/css">
    body,html{
        margin:0;
        padding:0
    }
    #darkplayer{
        position:absolute;
        width:100%important!;
        height:100%important!;
        border:none;
        overflow:hidden;
    }
</style>
        <div id="darkplayer"></div>
        <script type="text/javascript">
            var videoPlayer = jwplayer("darkplayer");
            videoPlayer.setup({
                sources: <?=$video?>,
                width: "100%",
                height: "100%",
                autostart: false,
            });
        </script>
    </body>
</html>
