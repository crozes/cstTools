#!/bin/bash
cd /var/www/html/cstTools && mysqldump -u root -pNanahara-31520 CST > /var/www/html/cstTools/CST.sql
cd /var/www/html/cstTools && git add /var/www/html/cstTools/CST.sql && git commit -m "BackUp base hebdomadaire `date`"
cd /var/www/html/cstTools && git push origin master
