Nz-Auth
===================================

Description:
===================================

CodeIgniter Auth with Twitter &amp; Facebook registering/logging in!


About:
===================================

This is a slightly modded version of the A3M auth plugin for CI. I stripped out a lot of the 'crap' and tidied it up some what.

http://codeigniter.com/forums/viewthread/144755/


Features:
===================================

1.  Sign Up, Sign In (with remember me) and Sign Out (Can use Facebook or Twitter)
2.  Reset Password for account
3.  reCAPTCHA support (optional)
4.  SSL support (optional)
5.  Language file support
6.  Sign In “Fail Attempt Offset” before user has to always solve the captcha (this is google style. Basically you can keep trying over and over… at human speed.)


Installation Steps:
===================================

1. Download, extract and upload
2. Import the sql script
3. Config your database details, standdard CI proceedure
4. In module/account config, turn on reCAPTCHA (optional)
5. In module/account config, turn on SSL (optional)


Social Links
===================================

https://dev.twitter.com/apps
https://developers.facebook.com/apps


Plugins & Libraries
===================================

- recaptcha_pi.php - http://code.google.com/p/recaptcha
- twitter_pi.php - https://github.com/jmathai/twitter-async
- facebook_pi.php - https://github.com/facebook/facebook-php-sdk
- phpass_pi.php - http://www.openwall.com/phpass

- jquery
- 960 grid
- normalize.css

- HMNC - https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/wiki/Home


Change Log
===================================

v0.2
- Fixed a few incorrect links
- Optimized the auth code
- Moved auth checking into the CI_Controller constructor

v0.1

- Renamed a lot of the files
- Reduced filesize from 6MB to 1.6MB
- Fixed problem with resetting password
- Tidied a lot of code up
- Reconstructed the social linking page
- Optimized the header/footer files
- Updated to latest Facebook API
- Updated to latest CI
- Updated to latest PHpass API
- Updated to latest jQuery
- Updated to latest 960.css
- Added normalize.css
- Removed OpenID
- Removed jQuery UI
- Removed a lot of redundant tables and optimized a little
- Removed a lot of user data gathered when logging in with facebook/twitter