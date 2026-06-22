#!/bin/bash

RANDOM_ID=$((100 + RANDOM % 900))

FINAL_FLAG="IIITBh{pixel_perfect_sqli_${RANDOM_ID}}"

echo "[+] Generated Flag: $FINAL_FLAG"

sed "s|FLAG_PLACEHOLDER|$FINAL_FLAG|g" /tmp/init.sql.template > /docker-entrypoint-initdb.d/init.sql

exec docker-entrypoint.sh mysqld