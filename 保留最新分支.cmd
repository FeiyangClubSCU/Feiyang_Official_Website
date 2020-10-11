git checkout --orphan latest_branch
git add -A
git commit -am "UPDATE-202010100000"
git branch -D master
git branch -m master
git push -f origin master