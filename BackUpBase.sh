#!/bin/bash

cd /var/www/html
mysqldump -u root -pNanahara-31520 CST > ./CST.sql
git add CST.sql
git commit -m "BackUp base hebdomadaire"
git push -u crozes -pNanahara-31520
