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
</div>
<hr>
           <div class="row">   
<?php
$id = $_GET['v'];
include 'vfunc.php';
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$id.'&maxResults=1&key='.$key.''),true);
$name=$yf[items][0][snippet][title];
$tgl=$yf[items][0][snippet][publishedAt];
$date=dateyt($tgl);
$des=$yf[items][0][snippet][description];
$channel=$yf[items][0][snippet][channelTitle];
$viewCount=$yf[items][0][statistics][viewCount];
$likeCount=$yf[items][0][statistics][likeCount];
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ' hour ', $duration);
$duration = str_replace('M', ' min ', $duration);
$duration = str_replace('S', ' sec ', $duration);
$kata = ''.$name.''; 
$kate = preg_replace('/[^a-z0-9_\-\.]/i','-',$name);
$kate = str_replace('.', '-', $kate);
$kate = str_replace('---', '-', $kate);
$kate = str_replace('--', '-', $kate);
$value = '4';
if (str_word_count($kata) > $value)
{
//Bila kalimat lebih dari 2 kata
$limit = implode(' ', array_slice(explode(' ', $kata), 0, $value)).'';
$lmit = preg_replace('/[^a-z0-9_\-\.]/i','-',$limit);
$lmit = str_replace('---', '-', $lmit);
$lmit = str_replace('--', '-', $lmit);
$lmit = str_replace(' ', '-', $lmit);
$lmit = str_replace('.', '-', $lmit);
}
else
{
$limit = $kata;
$lmit = str_replace('  ', '-', $limit);
}
$get_video = file_get_contents('http://vondo.xyz/video.php?videoid='.$id);
$title = 'Download Video '.$name.'  - Download 3GP - MP4 - FLV ('.$duration.') | Stafa.My.Id'; 

$hd = file_get_contents('http://vondo.xyz/dl.php?videoid='.$id);

echo '<div class="col-md-12"><td><div class="title_a"><span class="list-group-item list-group-item-success">'.$name.'<ted><a href="/nonton?v='.$id.'"><img width="100%"  src="https://ytimg.googleusercontent.com/vi/'.$id.'/hqdefault.jpg" alt="Thumbnail"/></a><br />
</div></div>



</td>
<td>';
echo'<div class="list-group-item list-group-item-warning" align="center"><img src="http://cdn.waptoing.com/img/view.png" width="18px" /> '.$viewCount.' <br /><img src="http://cdn.waptoing.com/img/like.png" width="18px"> '.$likeCount.' <br /><img src="http://cdn.waptoing.com/img/upload.png" width="18px" /> '.$date.' <br /><img src="http://cdn.waptoing.com/img/duration.png" width="18px" /> '.$duration.'</td></tr></tbody></table>


<span class="list-group-item list-group-item-info">'.$des.'</div>';
echo '<div class="vagination" align="center"><div class="btn btn-warning">Download Video</div>

<table width="100%"><tbody><tr><td width="50%">'.$get_video.'</td><td width="50%">


'.$hd.'

</td></tr></tbody></table><span class="list-group-item list-group-item-success"><table><tbody><tr><td><img src="/info-32.png"></td><td>If download link server doesnt work, please try server 2.
</td></tr>
</tbody></table></div></div>
';
include'related.php';
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
