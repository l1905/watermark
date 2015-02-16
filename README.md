### waterMark:  watermark PHP function
waterMark is a simple PHP function to apply watermark(image or text) to image
### Installing
just do : require 'src/waterMark.func.php';
### Usage
```php
//water image ,random postion, he water image transparent is 100
waterMark('src.jpg', 'dst0.jpg', 0, 'logo.png', 100);

//water image, postion top left
waterMark('src.jpg', 'dst0.jpg', 1, 'logo.png', 100);

//water image transparent is 50
waterMark('src.jpg', 'dst0.jpg', 1, 'logo.png', 50);
water image transparent is 30
waterMark('src.jpg', 'dst0.jpg', 1, 'logo.png', 30);

//water text ,postion random
waterMark('src.jpg', 'dsttext0.jpg', 0, '', '', 'litongxue', 6, '#990033');
//water text, font 8
waterMark('src.jpg', 'dsttext0.jpg', 1, '', '', 'litongxue', 6, '#990033');
```
You have an demo.php file with more examples.