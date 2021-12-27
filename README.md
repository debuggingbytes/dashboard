# Admin Dashboard

Custom built administration dashboard used for my projects on my freelance website [DebuggingBytes](www.debuggingbytes.com)

## Features

- User authentication
- Full CRUD features
- Client list
- Invoicing System
- Assignment System
- User Activity log

## Problems & Solutions

- Notification System
  - Showing notifications and have an updated system caused many errors due to the way ajax loads pages.
    - Fixed issue by manually loading all required files into ajax loaded scripts.
- Various sessions needed to be placed in files due to ajax loading. Solved this issue using ob_start()/ob_flush() in main pages to prevent header errors.

## License

[MIT](https://choosealicense.com/licenses/mit/)
