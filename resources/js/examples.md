## Example Extras

### Headroom
Add a sticky header.
```
import Headroom from 'headroom.js'

$(function () {
    var $header = $("header"),
        header = new Headroom($header[0], {
        offset: 100
    })
    header.init()
})
```
Check `https://wicky.nillia.ms/headroom.js/` for more information on configuration.

### Slick Slider
Initialise new Slick Sliders on `[data-slick]` elements
```
import 'slick-carousel'

$('[data-slick]').each(function () {
    $(this).slick()
})
```
Check `http://kenwheeler.github.io/slick/` for more information on configuration.
