
<!-- joubin: call this page like as picture.php?id=1170 -->

<?php
  $image_name = $_GET["name"];

  // joubin: you need to replace $filename with your SQLite3 file
  $db_handle  = new SQLite3("data/data.lrcat");

  $query_string_image = "SELECT idx_filename,  Adobe_images.id_local FROM Adobe_images JOIN AgLibraryFile WHERE Adobe_images.rootFile = AgLibraryFile.id_local AND AgLibraryFile.baseName = '" .$image_name. "'";
  $imageResult = $db_handle->query($query_string_image);
  $imageRow  = $imageResult->fetchArray();

  $query_string_faces = "SELECT tag, lc_name, image, tl_x, tl_y, br_x, br_y FROM AgLibraryKeywordFace JOIN AgLibraryFace JOIN AgLibraryKeyword WHERE AgLibraryKeywordFace.face = AgLibraryFace.id_local AND AgLibraryKeywordFace.tag = AgLibraryKeyword.id_local AND AgLibraryFace.image = '" .$imageRow['id_local']. "'";
  $faceResult = $db_handle->query($query_string_faces);
?>


<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<title> 69.Numbers.Suck </title>
<meta name="Author" content="Stu Nicholls">
<meta name="Keywords" content="style, cascading, sheets, Experiments, code, CSSplay, Stu, Nicholls, demonstrations, responsive, image, map, touch, screen, android, OS, iOS, iPad">
<meta name="Description" content=" A responsive image map suitable for all modern browsers without javascript">

<meta name="msapplication-TileImage" content="/cssplay-tile.png">
<meta name="application-name" content="CSS play">
<meta name="msapplication-TileColor" content="#006699">

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.cssplay.co.uk/feed.xml">
<meta http-equiv="imagetoolbar" content="no">
<link rel="shortcut icon" href="http://www.c3.hu/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://www.c3.hu/favicon.ico" type="image/ico">

<meta name="alexaVerifyID" content="NxZdT78RYs2r1JgJ_Sf4nE-uiaU">
<link rel="P3Pv1" href="http://www.cssplay.co.uk/w3c/p3p.xml">

<style type="text/css">
body
{
width:100%;
height:100%;
}
/* Image map styles */
.imageMap {width:100%; position:relative; margin: -8px -10px 0px -8px;}
.imageMap img {display:block; width:100%; border-radius:0px;}
.imageMap .hotspots {width:100%; height:100%; position:absolute; left:0; top:0; visibility:visible;}
.imageMap a {display:block; position:absolute; background:transparent; z-index:100; opacity:1; filter: alpha(opacity=20); box-shadow: 0 0 0 2px #000, 0 0 0 4px #fff;}
.imageMap a + p {position:absolute; left:0%; top:102%; width:100%; color:#000; display:none;}

.imageMap:hover .hotspots {visibility:visible;}
#info .imageMap p strong {display:block; padding:0; margin:0; font: bold 25px/30px 'latolight',sans-serif; color:#069;}
#info .imageMap p {padding:0; margin:0; font: normal 18px/22px 'latomedium', sans-serif; color:#444;}

.imageMap b {display:block; position:absolute; background:url(); z-index:200; opacity:0.2; filter: alpha(opacity=20); padding:1px;
-webkit-transition:0.75s;
-moz-transition:0.75s;
-o-transition:0.75s;
transition:0.75s;
}
.imageMap b.b1 {left:11%; top:5%; width:25%; height:34%;}
.imageMap b.b2 {left:76%; top:13%; width:21%; height:30%;}
.imageMap b.b3 {left:5%; top:44%; width:22%; height:42%;}
.imageMap b.b4 {left:28%; top:41%; width:26.5%; height:43%;}
.imageMap b.b5 {left:55%; top:64%; width:15%; height:26%;}
.imageMap b.b6 {left:72%; top:53%; width:25%; height:35%;}

.imageMap .hotspots div:hover b {width:0; padding:0;}
.imageMap .hotspots div:hover p {display:block;}
.imageMap .hotspots div:hover a {background:yellow; z-index:100; opacity:0.1; filter: alpha(opacity=30); border:2px solid yellow;}
</style>

</head>

<body id="www-cssplay-co-uk" class="demos">

  <div class="imageMap" aria-haspopup="true">
    <!-- joubin: replace the folder in src with the correct one: -->
  	<img src="data/<?php echo ($imageRow['idx_filename']); ?>" alt="">
  	<div class="hotspots">
    <!-- joubin: the following command needs testing I hope it works like this: -->
    <!-- joubin: also in the following you see that I moved the styling of box to here. then we need only one loop. -->
  <?php while($faceRow = $faceResult->fetchArray()) { ?>
      <div title="explore this collection">
        <a href="map.php?collection=<?php echo (str_replace(" ","_",$faceRow['lc_name'])); ?>" style=" left: <?php echo (number_format(100*$faceRow['tl_x'], 2, '.', '')); ?>%; top: <?php echo (number_format(100*$faceRow['tl_y'], 2, '.', '')); ?>%; width: <?php echo (number_format(100*($faceRow['br_x']-$faceRow['tl_x']), 2, '.', '')); ?>%; height: <?php echo (number_format(100*($faceRow['br_y'] - $faceRow['tl_y']), 2, '.', '')); ?>%;" rel="nofollow" aria-haspopup="true"></a>
      </div>
  <?php } ?>
    </div>
  </div>


</body></html>
