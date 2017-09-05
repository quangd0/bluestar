bluestar
========

A Symfony project created on September 5th, 2017, 11:45 am.

This the sample excercise coding with rough team roster building generation. There is more room to optimize the engine but for the purpose of coding style and ability I believe the codes are sufficient.

### The requirements:

```
1. Each player bot created must have a unique name.
Done
2. Each player bot must have an alphanumeric sequence that looks like the following: "ABC1234" (as an
example).
Done
2. No two player bots can have the same name.
Done
3. No two player bots can have the same total attribute score (speed + strength = total attribute score).
Done
4. You may use any sorting algorithm to deﬁne your 10 starter bots and 5 substitue bots. 
Done -- But the substitute is not yet implemented as the players genereation was completed and the substitutes should be fairly straight forward.
```

The codes were implement using Symfony 3.2.4 and php 7.1.9.

>**Code organizations:**

>- ./src/AppBundle/Controller/DefaultController.php
>- ./src/AppBundle/Objects
>-        BotAttribute.php
>-        BotEngine.php
>-        BotManager.php
->        BotPlayer.php
-> ./src/AppBundle/Resources/views
->        index.html.twig

**PHPUnit Test**
> ./src/AppBundle/Tests/Objects
>        BotEngineTest.php

**Procedure to install the application**

1. cd to the source
2. type > composer install
3. Now you can browse to the http://localhost and should see the 10 players with each player attributes and scores generated.


**Procedure to test the application with PHPUnit**

1. cd to the root folder
2. type > ./phpunit src/AppBundle/Tests
