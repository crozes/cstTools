#!/bin/bash

cd /var/www/html/cstTools && git add /var/www/html/cstTools/CST.sql && git commit -m "BackUp base hebdomadaire `date`"
cd /var/www/html/cstTools && git push origin master
