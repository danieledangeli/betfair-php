Big view
============
In this section is explained how the library is designed. 
Please read this section if you want contribute[].

The library is designed in a really simple way. The core object is the **Betfair** object. 
The **betfair** objects has 3 association: a BetfairClient, a container and an Adapter.

The __client__ object and the __adapter__ objects implemenets their interafces ( by following the Dependency Inversion principle )
With it you can built the helper objects. 
The helper objects extends the **AbstracBetfair** and have a set of methods to __query__ the Betfair endpoint API. 

![OOP library](http://oi59.tinypic.com/2wlycde.jpg "OOP libary")

