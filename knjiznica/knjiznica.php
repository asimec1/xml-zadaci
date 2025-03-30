<?php
// učitavanje XML dokumenta
$xml = new DOMDocument();
$xml->load('knjiznica.xml');

// validacija prema DTD-u
if ($xml->validate()) {
  echo "XML dokument je validan!<br><br>";
  
  // ispis knjiga iz XML-a
  $knjige = $xml->getElementsByTagName('knjiga');

  foreach ($knjige as $knjiga) {
    $id = $knjiga->getAttribute('id');
    $naslov = $knjiga->getElementsByTagName('naslov')->item(0)->nodeValue;
    $autor = $knjiga->getElementsByTagName('autor')->item(0)->nodeValue;
    $godina = $knjiga->getElementsByTagName('godina')->item(0)->nodeValue;

    echo "ID: $id<br>";
    echo "Naslov: $naslov<br>";
    echo "Autor: $autor<br>";
    echo "Godina izdanja: $godina<br><br>";
  }
} else {
  echo "XML dokument nije validan prema DTD-u.";
}
?>
