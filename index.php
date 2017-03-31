<?php

  if (isset($_GET["collection"])) {
    $collection_name = $_GET["collection"];
  } else {
    $db_handle = new SQLite3("data/data.lrcat");
    $query_string_collection = "SELECT * FROM AgLibraryKeyword WHERE id_local >= (abs(random()) % (SELECT max(id_local) FROM AgLibraryKeyword)) LIMIT 1;";
    $collectionResult = $db_handle->query($query_string_collection);
    $collectionRow = $collectionResult->fetchArray();
    $collection_name = str_replace(" ","_",$collectionRow['lc_name']);
  }
?>

<!DOCTYPE html>
<html class="no-js" lang="en_US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>69.numbers.suck</title>
	<style type="text/css">
		body
				{
					width:100%;
					height:100%;
					margin:0;
					padding: 0;
				}
	</style>
  <link rel="stylesheet" href="css/leaflet.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/leaflet.js"></script>
  <script src="<?php echo 'js/map-' .$collection_name. '.js'; ?>"></script>
</head>
<body>
  <div id="preview-wrap" style="max-width:100%">
    <div id="infomap"></div>
  </div>
</body>
</html>
