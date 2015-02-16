<?php

require 'src/waterMark.func.php';
//water image
waterMark('src.jpg', 'dst0.jpg', 0, 'logo.png', 100);
waterMark('src.jpg', 'dst1.jpg', 1, 'logo.png', 100);
waterMark('src.jpg', 'dst2.jpg', 2, 'logo.png', 90);
waterMark('src.jpg', 'dst3.jpg', 3, 'logo.png', 80);
waterMark('src.jpg', 'dst4.jpg', 4, 'logo.png', 70);
waterMark('src.jpg', 'dst5.jpg', 5, 'logo.png', 60);
waterMark('src.jpg', 'dst6.jpg', 6, 'logo.png', 50);
waterMark('src.jpg', 'dst7.jpg', 7, 'logo.png', 40);
waterMark('src.jpg', 'dst8.jpg', 8, 'logo.png', 30);
waterMark('src.jpg', 'dst9.jpg', 9, 'logo.png', 20);

//water text
waterMark('src.jpg', 'dsttext0.jpg', 0, '', '', 'litongxue', 6, '#990033');
waterMark('src.jpg', 'dsttext1.jpg', 1, '', '', 'litongxue', 6, '#CCFF66');
waterMark('src.jpg', 'dsttext2.jpg', 2, '', '', 'litongxue', 6, '#FFFF99');
waterMark('src.jpg', 'dsttext3.jpg', 3, '', '', 'litongxue', 6, '#FF6600');
waterMark('src.jpg', 'dsttext4.jpg', 4, '', '', 'litongxue', 6, '#FFFF00');
waterMark('src.jpg', 'dsttext5.jpg', 5, '', '', 'litongxue', 6, '#66FFFF');
waterMark('src.jpg', 'dsttext6.jpg', 6, '', '', 'litongxue', 7, '#999966');
waterMark('src.jpg', 'dsttext7.jpg', 7, '', '', 'litongxue', 8, '#99FF33');
waterMark('src.jpg', 'dsttext8.jpg', 8, '', '', 'litongxue', 9, '#FFFF99');
waterMark('src.jpg', 'dsttext9.jpg', 9, '', '', 'litongxue', 9, '#006600');


?>