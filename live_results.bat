@ECHO off

CD C:\axware\archive-results

SET found=""

FOR /F "tokens=* USEBACKQ" %%F IN (`git.exe status`) DO (
  ECHO %%F | FINDSTR /R "live-results\.html\>"
  IF NOT ERRORLEVEL 0 SET found+=%%F
  IF NOT ERRORLEVEL 0 GOTO DOIT
)

:DOIT
IF NOT %found% NEQ "" GOTO COMMIT

:COMMIT
CALL git.exe add live-results/live-results.html
CALL git.exe commit -m "updating live results."
CALL git.exe push origin gh-pages
