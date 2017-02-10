Yii 2 my app
============================
```bash
composer install
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
php yii migrate/up --migrationPath=@yii/rbac/migrations
php yii migrate
```


Updating DB schema
===========================
```bash
php yii cache/flush-schema
```

```
php yii rbac/create-role admin
php yii assign/role username admin
```