MobileSniffer
=============

Some procedural code that allows the detection of various mobile devices and then redirect. Useful for maintaining a single URL to your website but provide two (or more) different experiences.

Simply include the sniffer at the beginning of your main index file (before sending any content to the browser) 
and then call the function for the desired effect:

mobileSniffer($url)

Where $url = the url of the page which contains the mobile experience.
