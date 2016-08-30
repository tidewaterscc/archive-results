#!/bin/sh -x

gitStatus=$(git status)

fake_commit()
{
  echo "fake commit"
}

commit_changes()
{
  git add live-results/live-results.html && git commit -m "updating live results." && git push origin gh-pages
}

#main
if echo $gitStatus | grep -q "live-results\.html"; then
 fake_commit
fi

