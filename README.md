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

# modify frontend baseurl
```
path: frontend/nuxt.config.js
  proxy: {
    '/api': {
      target: 'http://example.com/api',
      pathRewrite: { '^/api': '/' }
    }
  },
```