#!/bin/bash

cd /var/www/html && git add /var/www/html/cstTools/CST.sql && git commit -m "BackUp base hebdomadaire `date`"
cd /var/www/html && git push origin master
