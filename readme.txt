=== Islamic Graphics ===
Contributors: iMuslim
Donate link: http://muslimmatters.org/become-an-ansaar/
Tags: islam, islamic, muslim, arabic, prophet, muhammad, sallalahu 'alayhi wa salam, radiallahu anhu, radiallahu anhum, alayhis salam, subhanahu wa ta ala, rahimaha Allah, rahimahu Allah, rahimahum Allah, SAW, RA, AS, SWT, shortcode, post, page, plugin, images, image
Requires at least: 2.7.0
Tested up to: 4.7.4
Stable tag: 1.2.4

Shortcode for the insertion of graphics representing the common Islamic phrases: SAW, RA, SWT and AS, into Wordpress posts and pages.

== Description ==

A simple set of shortcodes to allow authors to insert graphics that represent the common Islamic phrases: SAW, RA, SWT and AS, into Wordpress posts and pages.

Phrases included:
* 'alayhis salam
* rahimaha Allah
* rahimahu Allah
* rahimahum Allah
* radiallahu anha
* radiallahu anhu
* radiallahu anhum
* sallalahu 'alayhi wa salam
* subhanahu wa ta 'ala

Both black and white versions of each graphic are included.
Romanized text and the English translation can also be inserted to assist readers who do not know Arabic.

Plugin produced by http://MuslimMatters.org


== Installation ==

1. Upload the folder 'islamic_graphics' to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Manage default display options via Dashboard > Settings > Islamic Graphics


== Frequently Asked Questions ==

= How do I use the shortcodes to insert Islamic Graphics? =
The basic shortcode structure is [shortcode_name h="" c=""]

The following are a list of possible values for shortcode_name, and the islamic phrases that will result when they are used:

alayhis         - 'alayhi'l-salām, peace be upon him

rahimaha	- raḥimahā Allāh, may Allah have mercy upon her

rahimahu	- raḥimahullāh, may Allah have mercy upon him

rahimahum	- raḥimahum Allāh, may Allah have mercy upon them

ranha		- raḍyAllāhu 'anha, may Allah be pleased with her

ranhu		- raḍyAllāhu 'anhu, may Allah be pleased with him

ranhum          - raḍyAllāhu 'anhum, may Allah be pleased with them

saw		- ṣallallāhu 'alayhi wa sallam, peace and blessings of Allah be upon him

swt		- subḥānahu wa ta'āla, glorified and exalted be He

The h and c attributes are optional and allow you to override the plugin's default settings.

The h attribute controls the image height in pixels. Plugin default is 20px.
The c attribute sets the image colour: 'black' or 'white'. Plugin default is 'black'.

E.g., to insert the "ṣallallāhu 'alayhi wa sallam" graphic with a default height and colour, use: [saw]

E.g., to insert the "'alayhi'l-salām" graphic with an override height of 25px and default colour, use: [alayhis h="25"]

E.g., to insert the "subḥānahu wa ta'āla" graphic with a default height and override colour of white, use: [swt c="white"]

E.g., to insert the "raḥimahullāh" graphic with an override height of 18px and override colour of black, use: [rahimahu h="18" c="black"]

You can set your own default values for height and colour via the Options page, under Dashboard > Settings > Islamic Graphics.

Note: if you are upgrading from a pre-1.1.0 release of the plugin, you don't need to amend your posts to remove the "_w" from the shortcodes.
The images will still appear, but in the default colour. Set the default to white to perform an immediate site-wide change.

= Where can I find the default display options? =
Under Dashboard > Settings > Islamic Graphics.

From there you can set...

The default height of embedded images in pixels.

The default colour (black or white).

The display of images and/or text: 
1) Images only  - displays the graphic of the Islamic phrase only.
2) Images (with translation) - displays the graphic along with the English translation of phrase in brackets.
3) Romanized text (with translation) - displays the romanized version of the phrase with English translation in brackets.
4) Romanized text only - displays the romanized version of the phrase only.
5) Translation only - displays the English translation in brackets only.

= Can I customize the Islamic Graphic via CSS? =
Yes. Embedded images can be customized using 'img.islamic_graphic' and text by 'span.islamic_graphic'.

= Who designed the graphics? =

> v1.2.0+

A new set of graphics has been created from scratch especially for the plugin.

> v1.0.0-1.1.1.

The SAW graphic is based on the unicode symbol: ﷺ.
Radiallahu anh and SWT graphics were based on the font "Islamic Phrases", designed by AlMedia.net, which is available to download for free, for personal use only, from http://www.almedia.net/free-arabic-fonts.htm.
The remaining graphics were hand drawn.

== Screenshots ==

1. screenshot1.jpg - View of shortcodes in post editor.
2. screenshot2.jpg - View of islamic graphics embedded in a post.


== Changelog ==

= 1.2.4 =
Re-adding png images deleted during upload of v1.2.3.

= 1.2.3 =
Corrected saw images.

= 1.2.2 =
Tweaked saw, alayhis and swt images.

= 1.2.1 =
Fixed image size bug by preventing Jetpack Photon from serving Islamic Graphic images.

= 1.2.0 =
- A new set of images has been added in the form of SVG files for a more consistent look across articles and for smoother scaling. PNG fallback is included for older browsers.
- Default image size increased to 25 x 25 pixels. This can be changed by the user as described in the FAQ.

= 1.1.1 =
Added section to settings page to fix error seen in 3.3.1 version of Wordpress.

= 1.1.0 =
Major changes to code:
- Added options page to allow setting of default values for height, colour and display type.
- Removed _w shortcode and replaced with c attribute.
- Renamed image files and folders.

= 1.0.7 =
Added alt and title text to images.

= 1.0.6 =
Added images and codes for rahimahu Allah, rahimaha Allah and rahimahum Allah.

= 1.0.5 =
Images have been resized to prevent aliasing. Function now includes condition: when 'h' <= 20, 20 pixel tall images are used, else 40 pixel tall images are used.

= 1.0.4 =
Replaced swt.png and swt_w.png images.

= 1.0.3 =
Replaced swt.png and swt_w.png images.

= 1.0.2 =
Fixed broken img src url.

= 1.0.1 =
Changed filenames of white images, and shortcode function used to insert them.

= 1.0.0 =
* Initial release.


== Upgrade Notice ==

= 1.2.4 =
Major change! A new set of images has been added in the form of SVG files for a more consistent look across articles and for smoother scaling. PNG fallback is included for older browsers.

= 1.1.1 =
Major improvements to the plugin! Added an options page for setting of default display options. English translation can now be inserted with images. Consult FAQ for more details. (Settings page bug fix included).

= 1.1.0 =
Major improvements to the plugin! Added an options page for setting of default display options. English translation can now be inserted with images. Consult FAQ for more details.

= 1.0.7 =
Added alt and title text to images to show the transliterated version of the Islamic graphic, along with the translated meaning in English.

= 1.0.6 =
Added images and codes for rahimahu Allah, rahimaha Allah and rahimahum Allah.

= 1.0.5 =
Changes have been made to improve the quality of embedded islamic images.

= 1.0.4 =
Upgraded images for "subhanahu wa ta 'ala" phrase.

= 1.0.3 =
Upgraded images for "subhanahu wa ta 'ala" phrase.

= 1.0.2 =
Fix for broken img src url - upgrade immediately.

= 1.0.1 =
Changed filenames of white images, and shortcode function used to insert them.




