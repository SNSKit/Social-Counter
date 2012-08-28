<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Tutorial: Get Your Social Follower Count Using PHP</title>
	<link rel="stylesheet" href="css/style.css" /> 
</head>

<body>

<?php 

/********************************************************************************
 Twitter Follower Count
********************************************************************************/

/* Send the Twitter api to a PHP variable */
$twitter = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?screen_name=designwoop'), true);

/* Store the Twitter follower count */
$twiter_count = $twitter[0]['followers_count'];


/********************************************************************************
 FeedBurner Subscriber Count
********************************************************************************/

/* Send an XML feed of a FeedBurner URL to a PHP variable */
$rss = file_get_contents('http://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=http://feeds.feedburner.com/designwoop?format=xml');

/* Convert XML feed to an object */
$xml = new SimpleXmlElement($rss);

/* Store the FeedBurner count  */
$rss_count = $xml->feed->entry->attributes()->circulation;


/********************************************************************************
Facebook Like Count
********************************************************************************/

/* Send the FaceBook Graph to a PHP variable */
$facebook = json_decode(file_get_contents('http://graph.facebook.com/158483190866574'), true);

/* Store the  Facebook count  */
$facebook_count = $facebook['likes'];

?>

	<div class="wrap">
	
		<header>
		
			<h1>Demo: Get Your Social Follower Count Using PHP</h1>
		
			<p>Read the <a href="">full article</a> on how to get your Twitter, RSS and Facebook follower count.</p>
	
		</header>
		
		<section>
	
			<article>
			
				<div class="social-love">
				
					<ul>
						<li class="rss"><a href="http://feeds.feedburner.com/designwoop"><?php if ( '' != $rss_count ) { echo $rss_count; } ?></a></li>
						<li class="twitter"><a href="http://twitter.com/#!/designwoop"><?php if ( '' != $twiter_count ) { echo $twiter_count; } ?></a></li>
						<li class="facebook"><a href="http://www.facebook.com/pages/Designwoop/158483190866574"><?php if ( '' != $facebook_count ) { echo $facebook_count; } ?></a></li>
					</ul>
					
				</div>
				
			</article>
			
		</section>
	
	
		<footer>
		
			<p>A basic social statistic tutorial by <a href="http://designwoop.com/" title="DesignWoop">DesignWoop</a>, feel free to develop it further.</p>
		
		</footer>
		
	</div>

</body>

</html>