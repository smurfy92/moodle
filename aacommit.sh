#!/bin/bash
day=$(date "+%d")
month=$(date "+%M")
year=$(date "+%Y")
commit_message="$day/$month/$year"
commit() {
    git add -A
    git commit -m "$commit_message"
    git push
}
commit