<?php
echo '<div class="vagination" align="center"><h1 class="btn btn-info"><b>Vídeos relacionados</b></h1>'; 
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?key='.$key.'&part=snippet&maxResults=7&relatedToVideoId='.$_GET['v'].'&type=video');
$json = json_decode($grab);
foreach($json->items as $hasil) {$name = $hasil->snippet->title;
$link = $hasil->id->videoId;
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$link.'&maxResults=1&key='.$key.''),true);
$viewCount=$yf[items][0][statistics][viewCount];
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ' Hour ', $duration);
$duration = str_replace('M', ' min ', $duration);
$duration = str_replace('S', ' sec ', $duration);
$tgl = $hasil->snippet->publishedAt;
$date = dateyt($tgl);
$des = $hasil->snippet->description;
$chid = $hasil->snippet->channelId;
echo '<div class="col-md-12"><td><img src="https://ytimg.googleusercontent.com/vi/'.$link.'/default.jpg" alt="Thumbnail" class="list-group-item list-group-item-danger" title="'.$name.'" width="198px" height="178px"></td><span class="list-group-item list-group-item-success"><a href="/watch?v='.$link.'">'.$name.'</a></span><span class="list-group-item list-group-item-info">'.$duration.'</span><span class="list-group-item list-group-item-info">'.$date.'</span><span class="btn btn-info">'.$viewCount.' Views</span></td></tr></table></div><hr>';}?>
