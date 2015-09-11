# Image Processor

Created by [Trevor Elwell](http://trevorelwell.me)

# Instructions:

Want to install this on your own system? It's very simple to do! This app only uses one library which is [Imagine](https://imagine.readthedocs.org/en/latest/). Imagine is a OOP library for image manipulation, which is used to turn the original image into the 'SPOOKY' image. But, here are the steps to install this on your own server: 

1. Clone this git repo and upload onto your server
2. Ensure you have the (Imagine)[https://imagine.readthedocs.org/en/latest/] library installed on your system along with the GD library. Heroku makes it really easy by allowing you to add 'ext-gd' to your composer.json file. Learn more about (PHP on Heroku)[https://devcenter.heroku.com/articles/php-support].
3. Within functions.php you'll need to set the ROOT_URL global variables to be compatible with your local and/or production environments. 

Once you follow these steps you should be good to go! Please email me at [me@trevorelwell.com](mailto:me@trevorelwell.com) with any questions. Good luck!