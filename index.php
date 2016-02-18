<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart GT</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Smart GT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Acerca</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

   
  
          
               <form action="/index.php" method=get"><input class="form-control" type="text" name="q" value="<?php echo $q; ?>" width="80%"> <input type="submit" value="Search"> <br />
 
       <div class="row">                 
<?php
include 'vfunc.php';
if($_GET['q']){
$q = $_GET['q'];

$q=str_replace('-',' ',strip_tags($q));
$q=ucwords($q);

}
$title ='Vídeo '.$q.' - Waptoing música | vídeos | android';

if(!empty($_GET['q'])){echo'<h1 class="biru"><b>Resultados para: '.$q.'</b></h1>'; 
}else{echo'<h1 class="biru"><b>Resultados para: '.$q.'</b></h1>'; 
}
$qu=$q;
$qu=str_replace(" ","+", $qu);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu); if(strlen($_GET['page']) >1){$yesPage=$_GET['page'];}
else{$yesPage='';}
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?key='.$key.'&part=snippet&order=relevance&maxResults=10&q='.$qu.'&pageToken='.$yesPage.'&type=video');
$json = json_decode($grab);
$nextpage=$json->nextPageToken;
$prevpage=$json->prevPageToken;
foreach ($json->items as $sam){
$link= $sam->id->videoId;
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$link.'&maxResults=1&key='.$key.''),true);
$viewCount=$yf[items][0][statistics][viewCount];
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ' hour ', $duration);$duration = str_replace('M', ' min ', $duration);
$duration = str_replace('S', ' sec ', $duration);
 
$name= $sam->snippet->title;
$desc = $sam->snippet->description;
$chtitle = $sam->snippet->channelTitle;
$chid = $sam->snippet->channelId;
$date = dateyt($sam->snippet->publishedAt);

echo '<div class="col-md-12"><td><img src="https://ytimg.googleusercontent.com/vi/'.$link.'/default.jpg" alt="Thumbnail" class="list-group-item list-group-item-danger" title="'.$name.'" width="198px" height="178px"></td><span class="list-group-item list-group-item-success"><a href="/watch?v='.$link.'">'.$name.'</a></span><span class="list-group-item list-group-item-info">'.$duration.'</span><span class="list-group-item list-group-item-info">'.$date.'</span><span class="btn btn-info">'.$viewCount.' Views</span></td></tr></table></div><hr>';

} 

echo'</tbody></table>
</div>
<div class="vagination" align="center">';
if (strlen($prevpage)>1){if (strlen($_GET['q'])>1){echo'<a href="/index.php?q='.$q.'&page='.$prevpage.'" class="btn btn-success">&laquo; Siguiente</a> ';}else {echo'<a href="/index.php?q='.$q.'&page='.$prevpage.'" class="btn btn-success">&laquo; Anterior</a> ';}}
if (strlen($nextpage)>1){if (strlen($_GET['q'])>1){echo'<a href="/index.php?q='.$q.'&page='.$nextpage.'" class="btn btn-success">Siguiente &raquo;</a> ';}else{
echo' <a href="/index.php?q='.$q.'&page='.$nextpage.'" class="btn btn-success">Siguiente &raquo;</a>';}}
echo'</div>';

?>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Smart GT 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
