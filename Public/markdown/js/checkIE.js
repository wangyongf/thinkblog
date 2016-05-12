/**
 * Created by yongf-new on 2016/5/11.
 */

var ua = window.navigator.userAgent;
if (ua.indexOf("MSIE") >= 1) {
    {
        location.replace("<?php echo U('Admin/Dashboard/tip'); ?>");
    }
}