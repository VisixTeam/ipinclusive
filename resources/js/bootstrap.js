const NODE_MODULES_PATH = './../../node_modules/';
const PLUGINS_PATH = './../../../base/resources/js/plugins/';
const LIBS_PATH = './../../../base/resources/js/libs/';

try {
    window.$ = window.jQuery = require('jquery')
} catch (e) {}
