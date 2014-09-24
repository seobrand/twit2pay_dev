<?php /*?><div class="footer_title"><p><?php echo 'Axara on'?> <span>Facebook</span></p></div>
          <ul>
          <?php
   
    ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9');
 

    $rssUrl = "http://www.facebook.com/feeds/page.php?id=251712708218816&format=rss20";
  
    $xml = simplexml_load_file($rssUrl); // Load the XML file
    
    $entry = $xml->channel->item;
   
    $returnMarkup = '';
    for ($i = 0; $i <= 20; $i++) {
if($entry[$i]->title != '' || $entry[$i]->title != null || !empty($entry[$i]->title)) {   
 ?>
    <li><img src="http://graph.facebook.com/100003195004123/picture?type=square" alt="icon" /><a href="<?php echo $entry[$i]->link ?>" target="_blank"> <?=$entry[$i]->title?> </a></li>
    <?php }}?>
           
          </ul>
        </div>


<? */ ?>
<?php 
/*
//replace the Page ID with your own
$url = "http://www.facebook.com/feeds/page.php?id=251712708218816&format=json";
 
// disguises the curl using fake headers and a fake user agent.
function disguise_curl($url)
{
  $curl = curl_init();
 
  // Setup headers - the same headers from Firefox version 2.0.0.6
  // below was split up because the line was too long.
  $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
  $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,/*;q=0.5";
  $header[] = "Cache-Control: max-age=0";
  $header[] = "Connection: keep-alive";
  $header[] = "Keep-Alive: 300";
  $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $header[] = "Accept-Language: en-us,en;q=0.5";
  $header[] = "Pragma: ";  browsers keep this blank.
 
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla');
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  curl_setopt($curl, CURLOPT_REFERER, '');
  curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
  curl_setopt($curl, CURLOPT_AUTOREFERER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_TIMEOUT, 10);
 
  $html = curl_exec($curl); // execute the curl command
  curl_close($curl); // close the connection
 
  return $html; // and finally, return $html
}
 
// uses the function and displays the text off the website
$text = disguise_curl($url);
 
$json_feed_object = json_decode($text);
 
foreach ( $json_feed_object->entries as $entry )
{
     echo "<h2>{$entry->title}</h2>";
    $published = date("g:i A F j, Y", strtotime($entry->published));
    echo "<small>{$published}</small>";
    echo "<p>{$entry->content}</p>";
    echo "<br />";
}
*/
//Twitter API
$token = '54980136-MKbhrrNoPzxgSQfdByHHYTXfs5UjbRrAhxysLf4WY';
$token_secret = 'DUCfqFNLJrcaWLdPceYvGM61RngygCs4e2FSPAAAJPrQq';
$consumer_key = '4EfzHqfbe1kKtHxgxxVzug';
$consumer_secret = 'HxZB2AqWiVgNNvaTwQBHV081iinMwaNX9RzWdZFvjI';

$host = 'api.twitter.com';
$method = 'GET';
$path = '/1.1/statuses/user_timeline.json'; // api call path

$query = array( // query parameters
		'screen_name' => 'colocationusa',
		'count' => '5'
);

$oauth = array(
		'oauth_consumer_key' => $consumer_key,
		'oauth_token' => $token,
		'oauth_nonce' => (string)mt_rand(), // a stronger nonce is recommended
		'oauth_timestamp' => time(),
		'oauth_signature_method' => 'HMAC-SHA1',
		'oauth_version' => '1.0'
);

$oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
$query = array_map("rawurlencode", $query);

$arr = array_merge($oauth, $query); // combine the values THEN sort

asort($arr); // secondary sort (value)
ksort($arr); // primary sort (key)

// http_build_query automatically encodes, but our parameters
// are already encoded, and must be by this point, so we undo
// the encoding step
$querystring = urldecode(http_build_query($arr, '', '&'));

$url = "https://$host$path";

// mash everything together for the text to hash
$base_string = $method."&".rawurlencode($url)."&".rawurlencode($querystring);

// same with the key
$key = rawurlencode($consumer_secret)."&".rawurlencode($token_secret);

// generate the hash
$signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

// this time we're using a normal GET query, and we're only encoding the query params
// (without the oauth params)
$url .= "?".http_build_query($query);
$url=str_replace("&amp;","&",$url); //Patch by @Frewuill

$oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
ksort($oauth); // probably not necessary, but twitter's demo does it

// also not necessary, but twitter's demo does this too
function add_quotes($str) { return '"'.$str.'"'; }
$oauth = array_map("add_quotes", $oauth);

// this is the full value of the Authorization line
$auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));

// if you're doing post, you need to skip the GET building above
// and instead supply query parameters to CURLOPT_POSTFIELDS
$options = array( CURLOPT_HTTPHEADER => array("Authorization: $auth"),
		//CURLOPT_POSTFIELDS => $postfields,
		CURLOPT_HEADER => false,
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false);

// do our business
$feed = curl_init();
curl_setopt_array($feed, $options);
$json = curl_exec($feed);
curl_close($feed);

$twitter_data = json_decode($json);
echo '<pre>';
print_r($twitter_data);
?>
