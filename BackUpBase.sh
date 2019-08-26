#!/bin/bash

cd /var/www/html && mysqldump -u root -pNanahara-31520 CST > /var/www/html/CST.sql
cd /var/www/html && git add /var/www/html/CST.sql && git commit -m "BackUp base hebdomadaire `date`"
cd /var/www/html && git push origin
