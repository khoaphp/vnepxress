<?php
//Tin: idTin, TieuDe, TomTat, urlHinh, Content
require("simple_html_dom.php");
$html = file_get_html("https://vnexpress.net/the-thao/p8");

$news = $html->find(".list_news");

foreach($news as $new){
    echo $tieude = $new->find(".title_news a", 0)->plaintext;
    $tomtat = $new->find(".description", 0)->plaintext;
    $hinh = $new->find(".thumb_art a img", 0)->getAttribute("data-original");
    
    //download hinh
    $img = './download/'. basename($hinh);
    file_put_contents($img, file_get_contents($hinh));

    // content
    $linkchitiet = $new->find(".title_news a", 0)->href;
    $html2 = file_get_html($linkchitiet);
    $noidung = $html2->find("article.content_detail", 0)->innertext;

    echo "<hr/>";
}


?>