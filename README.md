> ** Technology **
> nuxtjs + laravel + docker-compose

> ** Description **
> a easy input url to crawler website demo

# Setting backend
> backend/.env

```
> Setting
cp backend/.env.example backend/.env
php artisan key:generate

> Setting Database
DB_HOST=mysql
REDIS_HOST=redis
```

# Setting frontend
```
path: frontend/nuxt.config.js
  proxy: {
    '/api': {
      target: 'http://example.com/api',
      pathRewrite: { '^/api': '/' }
    }
  },
```

> fix PHP and nodejs cannot install the same docker environment
> when using screenshot through Nginx pass request to nodejs
```
ln -s ${PWD}/puppeteer/images ${PWD}/backend/storage/images
```