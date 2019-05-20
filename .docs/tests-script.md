#### Tests script

```bash
$ ./.bin/php-tests --all
```

Example output
```
PHP Dev Helper Script
Version 0.0.36

Selected options:
 [ ON ] PHPUnit
 [ ON ] PHPUnit code coverage
 [ -- ] Multi-tester
 [ -- ] PHPMetrics
 [ ON ] PHPStan
 [ ON ] Psalm
 [ ON ] Code sniffer
 [ ON ] Code sniffer Beautifier

PHP Version:
PHP 7.3.5 (cli) (built: May  4 2019 01:43:51) ( ZTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.5, Copyright (c) 1998-2018 Zend Technologies
    with Xdebug v2.7.0, Copyright (c) 2002-2019, by Derick Rethans
PHPUnit...
Found XDEBUG Filter file...
PHPUnit 8.1.5 by Sebastian Bergmann and contributors.

Testing 
............................................                      44 / 44 (100%)

Time: 597 ms, Memory: 12.00 MB

OK (44 tests, 244 assertions)

Generating code coverage report in Clover XML format ... done

Generating code coverage report in HTML format ... done


Code Coverage Report:       
  2019-05-17 11:39:37       
                            
 Summary:                   
  Classes: 100.00% (6/6)    
  Methods: 100.00% (48/48)  
  Lines:   100.00% (155/155)

\AlecRabbit\Formatters::AlecRabbit\Formatters\TimerReportFormatter
  Methods: 100.00% ( 7/ 7)   Lines: 100.00% ( 40/ 40)
\AlecRabbit\Reports::AlecRabbit\Reports\TimerReport
  Methods: 100.00% ( 4/ 4)   Lines: 100.00% ( 22/ 22)
\AlecRabbit\Timers::AlecRabbit\Timers\HRTimer
  Methods: 100.00% ( 5/ 5)   Lines: 100.00% (  7/  7)
\AlecRabbit\Timers::AlecRabbit\Timers\Timer
  Methods: 100.00% ( 4/ 4)   Lines: 100.00% (  6/  6)
\AlecRabbit\Timers\Core::AlecRabbit\Timers\Core\AbstractTimer
  Methods: 100.00% (18/18)   Lines: 100.00% ( 68/ 68)
\AlecRabbit\Timers\Core\Traits::TimerFields
  Methods: 100.00% (10/10)   Lines: 100.00% ( 12/ 12)
PHPStan...
PHPStan - PHP Static Analysis Tool 0.11.6
 12/12 [*************************] 100%

                                                                                                                        
 [OK] No errors                                                                                                         
                                                                                                                        

Psalm...
Psalm 3.2.12@fe0f352132f798512ced19faf75cbfc84e4aabe7
Scanning files...
Analyzing files...

------------------------------
No errors found!
------------------------------

Checks took 0.72 seconds and used 139.680MB of memory
Psalm was able to infer types for 98.2143% of the codebase
PHP Code Sniffer...
PHP_CodeSniffer version 3.4.2 (stable) by Squiz (http://www.squiz.net)
PHP Code Sniffer Beautifier...
PHP_CodeSniffer version 3.4.2 (stable) by Squiz (http://www.squiz.net)

No fixable errors were found

Time: 3.84 secs; Memory: 8MB

2019-05-17 11:39:52
Executed in 17s
Bye!
```
