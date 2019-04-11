const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;

require('bootstrap-sass');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});