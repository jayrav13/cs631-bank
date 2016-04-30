mysql -u root < delete.sql
cd migrations/
php migrate.php
cd ../seeds/
php seed.php
cd ../helpers/
php insert.php