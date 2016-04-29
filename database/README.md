## Databases

Consider making a `reset.sh` file that can reset and reseed the entire database using the `delete.sql` file.

Jay's file:

```bash
mysql -u root < delete.sql
cd migrations/
php migrate.php
cd ../seeds/
php seed.php
```
