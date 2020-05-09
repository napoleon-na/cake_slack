# CakeSlack


## Setting

### Config/bootstrap.php

```
Configure::write('Slack', [
    'token' => 'Your access token', // 'XXXXXXXXX/YYYYYYYYY/zzzzzzzzzzzzzzzzzzzzzzzz'
]);
```
### How to use

```
<?php
App::uses('Slack', 'CakeSlack.Lib');

....

Slack::send('Hello from CakePHP!');
