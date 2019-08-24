#!/bin/bash
input="filename"
while IFS= read -r line
do
    STR+=$(dig +short $line | tail -n1)','
done < "$input"
echo $STR
