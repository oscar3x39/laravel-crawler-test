# .env
```
cp backend/.env.example backend/.env
php artisan key:generate
```

# modify database hosts to docker container
```
DB_HOST=mysql
REDIS_HOST=redis
```

# puppetter error and fixed solution
```
{
    "message": "The command \"PATH=$PATH:/usr/local/bin:/opt/homebrew/bin NODE_PATH=`npm root -g` node '/var/www/html/vendor/spatie/browsershot/src/../bin/browser.js' '{\"url\":\"http:\\/\\/google.com\",\"action\":\"screenshot\",\"options\":{\"type\":\"png\",\"path\":\"\\/var\\/www\\/html\\/storage\\/images\\/01b90dd5d3bc7b11fa6b96a7eceec64102836962.jpg\",\"args\":[],\"viewport\":{\"width\":3840,\"height\":2160},\"landscape\":true,\"waitUntil\":\"networkidle0\"}}'\" failed.\n\nExit Code: 127(Command not found)\n\nWorking directory: /var/www/html/public\n\nOutput:\n================\n\n\nError Output:\n================\nsh: line 1: npm: command not found\nsh: line 1: node: command not found\n",
    "exception": "Symfony\\Component\\Process\\Exception\\ProcessFailedException",
    "file": "/var/www/html/vendor/spatie/browsershot/src/Browsershot.php",
    "line": 862
}
```