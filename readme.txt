=== WP Recent Post Slider with Responsive  ===
Contributors: wponlinehelp, bhargavDholariya 
Tags: post slider, posts slider, default post slider, recent post slider, slider, responsive post slider, responsive posts slider, responsive recent post slider, responsive default post slider, responsive default posts slider, wordpress posts slider, post slideshow, posts slideshow, recent posts slideshow, post slider design,
Requires at least: 3.1
Tested up to: 4.9.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, Easy way to add and display Responsive WordPresss Default Post Slider on your website with four Designs using a simple shortcode.

== Description ==
Responsive Default WordPresss Post Slider is a WordPress posts content slider plugin with touch for mobile devices and responsive. WordPresss Default Post Slider displays your recent posts using 4 designs with beautiful slider.

A multipurpose responsive WordPresss posts slider plugin powered with four built-in design template, lots of easy customizable options. Display unlimited number of WordPresss posts slider in a single page or post with different sets of options like category, limit, navigation type and many more. 

= Here is the WordPress Default Post Slider shortcode example =

* **Main shortcode:** 

<code>[wpoh_post_slider]</code>

* **To display only latest 4 post:**

<code>[wpoh_post_slider limit="4"]</code>
Where limit define the number of posts to display.

* **If you want to display WordPress Default Post Slider by category then use this short code:** 

<code>[wpoh_post_slider category="category_ID"]</code>

* **We have given 4 designs. For designs use the following shortcode:** 

<code>[wpoh_post_slider design="design-1"]</code> 
Where designs are : design-1, design-2, design-3, design-4  

You can see and select all the designs from Post -> Post Slider Designs. Here you can use the shortcode for design that you like and want to use for your website.

= Here is Template code =
<code><?php echo do_shortcode('[wpoh_post_slider]'); ?> </code>

= Use Following Recent Post Slider parameters with shortcode =
<code>[wpoh_post_slider]</code>

* **limit** : [wpoh_post_slider limit="8"] (Display only 8 latest post. By default it display 8 latest posts with shortcode [wpoh_post_slider].
 If you want to display all posts then use limit="-1").
* **design** : [wpoh_post_slider design="design-1"] (You can select 4 design( design-1, design-2, design-3, design-4 ) for your recent post slider. ).
* **category**: [wpoh_post_slider category="category_ID"] ( ie Display recent post slider by their category ID ).
* **show_category_name** : [wpoh_post_slider show_category_name="true" ] (Display category name OR not. By default value is "True". Options are "ture OR false").
* **show_date** : [wpoh_post_slider show_date="false"] (Display post date OR not. By default value is "True". Options are "ture OR false")
* **show_content** : [wpoh_post_slider show_content="true" ] (Display post Short content OR not. By default value is "True". Options are "ture OR false").
* **media_size** : [wpoh_post_slider  media_size="full"] (where you can use values : thumbnail, medium, medium_large, large and full)
* **Pagination and arrows** : [wpoh_post_slider dots="false" arrows="false"]
* **Autoplay and Autoplay Interval**: [wpoh_post_slider autoplay="true" autoplay_interval="100"]
* **Slide Speed**: [wpoh_post_slider speed="3000"]
* **content_words_limit** : [wpoh_post_slider content_words_limit="30" ] (Control post short content Words limit. By default limit is 20 words).
* **Added New Shortcode Parameters**
* **post_type:** [wpoh_post_slider post_type="post"] (ie added custom post type where you add custom post. By default value is "post")
* **taxonomy:** [wpoh_post_slider taxonomy="category"] (ie added custom taxonomy, where you add custom taxonomy. By default value is "category")
* **hide_post:** [wpoh_post_slider hide_post="1,2,3"] (ie exclude some posts with their post-id that you do not want to display)
* **show_author** [wpoh_post_slider show_author="false"] (ie Display author name OR not. By default value is "true". Values are "true OR false")
* **show_read_more** [wpoh_post_slider show_read_more="true"] (Display read more button. Values are "true OR false")


= Features include: =
* Easy to add and display.
* Given four designs.
* Media size ie  thumbnail, medium, medium_large, large and full
* Fully Responsive.
* All Devices Responsive touch slider.
* Easy Mouse Draggable.
* You can create multiple WordPress post slider with different options at single page or post.
* Add Custom post type.
* Exclude Post with their ID's that you do not want to display.


== Installation ==

1. Upload the 'wp-recent-post-slider-with-responsive' folder to the '/wp-content/plugins/' directory.
2. Activate the "WP Recent Post Slider with Responsive" list plugin through the 'Plugins' menu in WordPress.
3. Add this short code where you want to display recent post slider
<code>[wpoh_post_slider]</code>


== Screenshots ==

1. Design-1
2. Design-2
3. Design-3
4. Design-4
5. Designs
6. Category shortcode for post

== Changelog ==

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0 =
* Initial release.