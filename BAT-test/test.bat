@Echo off

:m1
Echo Select program:
Echo.
Echo 1 - Program 1
Echo 2 - Программа 2
Echo 3 - Программа 3

echo.
Set /p choice="Your choice: "
if not defined choice goto m1
if "%choice%"=="1" (help >> hlp.txt)
if "%choice%"=="2" (dir)
if "%choice%"=="3" (start 3.exe)
Echo.
Echo Не правильно сделан выбор задания
Echo.
Echo.
goto m1
pause >nul