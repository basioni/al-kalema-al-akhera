=== Easy Banners ===
Contributors: bannersky
Donate link: http://www.bannersky.com/donate
Plugin URI: http://www.bannersky.com/html/easy-banners-for-wordpress.html
Tags: bannersky,easy,banners,header,right,Ads
Requires at least: 2.8.2
Tested up to: 3.4.2
Stable tag: 1.4

Easy Banners allows you to display a banner quickly. The banner can be shown on all page by change theme file or just a single post/page by short code.

== Description ==

The plugin can run by WordPress short code or can be inserted into template files to run on each page. From version 1.4 the short code was supported.

The banner support image, Ads and flash. You may set the target link and it will be navigated to once the banner clicked. For flash banner it is not supported this stage. 

The plugin won't upload image/flash itself and you should use the default media feature of WordPress.

Enjoy it!

== Installation ==

Activate the plugin then you can use either a short code [esbsingle id=1] to place in a page or post or use the call below to place into a template file.

function call:

<pre>
if (function_exists('wp_easy_banner_display')){
    wp_easy_banner_display('RIGHT', 'Your_ Conatainer_Class', 'Your text of hyperlink');
}
</pre>

The plugin has a very easy admin page that allows you to manage all banners

== Frequently Asked Questions ==

Please visit <a href="http://www.bannersky.com/html/easy-banners-for-wordpress.html">http://www.bannersky.com/html/easy-banners-for-wordpress.html</a> for documents or support.

== Screenshots ==

1. Admin interface of banners list and how to manage banenrs
2. Admin interface of add banner
3. Example of how to insert short code into a post


== Changelog ==
1.4 Support shortcode, it will be easy to insert the banner in post or pages. Fixed some bugs.

1.3 Remove check source and target url option.

1.2 Added popup to show the wp-content/uploads folder medias, and standardized some of the elements. Fixed CURL error.
    The medias will be shown only image(jpg,png,gif,jpeg) or flash(swf).
    Thanks for Brian's advice and contribution.
    
1.1 Fixed bug with 'LEFT' not working when chosen. The old will be setted HEADER when you chosen LEFT. Fixed now.

1.0 First version.
