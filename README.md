# The Simplest CRM System Ever

<img width="481" alt="image" src="https://github.com/crock/ezCRM/assets/8924090/33f6d381-cdb0-4e82-ad87-3bb1ea38c0ca">


This CRM has two endpoints:

1. /subscribe.php
2. /unsubscribe.php

## Usage 
Send a POST request to the respective endpoint with at least an `email` field in the form payload. The subscribe endpoint can also accept a `name` and `birthday` property if desired, but those can optionally be left out of the payload.

## Additional Comments
- The tool writes to `crm.csv` by default. It is recommended to change the name of the file to something random for security reasons. **Important! Be sure to update the hardcoded references to the filename in both `subscribe.php` and `unsubscribe.php`.**
- This system works really with [SerialMailer 8](https://serialmailer.com)'s remote CSV import feature if you need an inexpensive bulk email sender for macOS.