### Setup script

```bash
$ ./install
```
Example output
```
🔧 Package template setup...
Version 0.4.1
It should be unique among your packages!
 Enter package name:
 [looney-package] 
 Accepted value: 'looney-package'

 Enter package owner:
 (Used in composer.json line: "name": "owner/name"))
 [bugs-bunny] 
 Accepted value: 'bugs-bunny'

 Enter package owner name:
 (Used in LICENSE file)
 [Bugs Bunny] 
 Accepted value: 'Bugs Bunny'

 Enter package description:
 (Used in composer.json line: "description": "Your awesome description")
 [Awesome package description] 
 Accepted value: 'Awesome package description'

 Enter package namespace:
 [LooneyPackage] 
 Accepted value: 'LooneyPackage'

 Enter package owner namespace:
 [] 
 Accepted value: ''

It should be new non-existent yet dir name!
 Enter package dir:
 [php-looney-package] 
 Accepted value: 'php-looney-package'

Creating directory '.settings'
Preparing setup
Using values:
Name: Bugs Bunny
Package: bugs-bunny/looney-package
Description: Awesome package description
Namespace: LooneyPackage
Directory: php-looney-package

Saved '.results/.env'
Saved '.results/composer.json'
Saved '.results/CHANGELOG.md'
Saved '.results/README.md'
Saved '.results/.github/ISSUE_TEMPLATE.md'
Saved '.results/LICENSE'
Saved '.results/TERMINAL_TITLE'
Saved '.results/TODO.md'
Saved '.results/src/LooneyPackage/BasicClass.php'
Saved '.results/tests/Unit/BasicTest.php'
Saved '.results/.gitattributes'
Saved '.results/.gitignore'
Files prepared
Continue setup? [y/n] y
Installing
Copying files...
🛑 docker-compose is not installed
Renaming package dir
Cleaning up...
Removing files...
Repository
Initializing new git repository
Adding files

🛑 ppt:ERROR Can't commit: git user credentials not configured

Successfully installed new package in '/tmp/php-looney-package'
```
