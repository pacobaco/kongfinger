// Copyright Bang Chihuahua, Limited 2012

<?php
$stopwords = array("a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", 
"amongst", "amoungst", "amount", "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as", "at", "back","be","became", "because","become","becomes", 
"becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", 
"could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", 
"every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", 
"full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", 
"however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", 
"meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", 
"nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", 
"out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", 
"sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", 
"themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", 
"throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", 
"what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", 
"whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");
class crawler
{
protected $_url;
protected $_depth;
protected $_host;
protected $_useHttpAuth = false;
protected $_user;
protected $_pass;
protected $_seen = array();
protected $_filter = array();
protected $stopwords = array("a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", 
"also","although","always","am","among", "amongst", "amoungst", "amount", "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as", "at", 
"back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", 
"by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", 
"elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", 
"formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", 
"hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", 
"latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", 
"neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", 
"other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", 
"serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", 
"system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", 
"thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", 
"up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", 
"whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", 
"the");
protected $cap = array();
function get_all_emails($string)
{
$string = strtoupper($string);
$emails = preg_split('/[\s,;\<>]/', $string);
foreach($emails as $index => $email) 
{
if(! filter_var($email, FILTER_VALIDATE_EMAIL))
unset($emails[$index]);
}
return $emails;
}
public function __construct($url, $depth = 5)
{
$this->_url = $url;
$this->_depth = $depth;
$parse = parse_url($url);
$this->_host = $parse['host'];
}
protected function _processAnchors($content, $url, $depth)
{
$dom = new DOMDocument('1.0');
@$dom->loadHTML($content);
$anchors = $dom->getElementsByTagName('a');
foreach ($anchors as $element) {
$href = $element->getAttribute('href');
if (0 !== strpos($href, 'http')) {
$path = '/' . ltrim($href, '/');
if (extension_loaded('http')) {
$href = http_build_url($url, array('path' => $path));
} else {
$parts = parse_url($url);
$href = $parts['scheme'] . '://';
if (isset($parts['user']) && isset($parts['pass'])) {
$href .= $parts['user'] . ':' . $parts['pass'] . '@';
}
$href .= $parts['host'];
if (isset($parts['port'])) {
$href .= ':' . $parts['port'];
}
$href .= $path;
}
}
// Crawl only link that belongs to the start domain
$this->crawl_page($href, $depth - 1);
}
}
protected function _getContent($url)
{
$handle = curl_init($url);
if ($this->_useHttpAuth) {
curl_setopt($handle, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($handle, CURLOPT_USERPWD, $this->_user . ":" . $this->_pass);
}
// follows 302 redirect, creates problem wiht authentication
// curl_setopt($handle, CURLOPT_FOLLOWLOCATION, TRUE);
// return the content
curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
/* Get the HTML or whatever is linked in $url. */
$response = curl_exec($handle);
$parres = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $response);
//$parres = strtoupper($parres);
// response total time
$time = curl_getinfo($handle, CURLINFO_TOTAL_TIME);
/* Check for 404 (file not found). */
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
curl_close($handle);
return array($parres, $httpCode, $time);
}
protected function _printResult($url, $depth, $httpcode, $time)
{
ob_end_flush();
$currentDepth = $this->_depth - $depth;
$count = count($this->_seen);
echo "N::$count,CODE::$httpcode,TIME::$time,DEPTH::$currentDepth URL::$url <br>";
ob_start();
flush();
}
protected function isValid($url, $depth)
{
if (strpos($url, $this->_host) === false
|| $depth === 0
|| isset($this->_seen[$url])
) {
return false;
}
foreach ($this->_filter as $excludePath) {
if (strpos($url, $excludePath) !== false) {
return false;
}
}
return true;
}
public function crawl_page($url, $depth)
{
if (!$this->isValid($url, $depth)) {
return;
}
// add to the seen URL
$this->_seen[$url] = true;
// get Content and Return Code
list($content, $httpcode, $time) = $this->_getContent($url);
foreach ($this->get_all_emails($content) as $b){
echo $b, ' '; 
}
$string=strip_tags($content);
$string = preg_replace("/[^a-zA-Z 0-9]+/", " ", $string);
$string = strtoupper($string);
$output = explode(" ", $string);
//$content = strtoupper($content);
$r = array_keys($output);
//$a2 = array(); echo $d.'<br>';
foreach ($output as $d){
if (in_array($d, $this->cap)){
echo $d; 
}
echo $d.'<br>';
// if ($a2[$term]){
// $a2[$term] = $a2[$term]+1;
// }else{
//
// $a2[$term] = 1;
// }
}
// var_dump($a2);
// var_dump($output);
// foreach ($a2 as $b=>$c){
// echo $b;
// echo $b.' '.$c.'\n';
//
// }
// print Result for current Page
$this->_printResult($url, $depth, $httpcode, $time);
// process subPages
$this->_processAnchors($content, $url, $depth);
}
public function setHttpAuth($user, $pass)
{
$this->_useHttpAuth = true;
$this->_user = $user;
$this->_pass = $pass;
}
public function addFilterPath($path)
{
$this->_filter[] = $path;
}
public function run()
{
foreach($this->stopwords as $t){
array_push($this->cap, $t);
}
$this->crawl_page($this->_url, $this->_depth);
}
}
$startURL = 'http://www.famu.edu/';
$depth = 6;
$username = 'YOURUSER';
$password = 'YOURPASS';
$file = fopen('HBCU.csv', 'r');
//while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
//  echo implode(' '. $line);
//}
//fclose($file);
$crawler = new crawler($startURL, $depth);
$crawler->setHttpAuth($username, $password);
// Exclude path with the following structure to be processed 
$crawler->addFilterPath('customer/account/login/referer');
$crawler->run();
?>
