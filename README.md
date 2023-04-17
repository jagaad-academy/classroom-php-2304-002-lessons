# Backend PHP Course Classroom 2304-002

This repository contains the exercise solutions, examples, and projects presented during the Backend PHP Course classroom 2304-002. The course is organized by modules, chapters, and lessons, starting from PHP basics until getting into the Symfony framework. You can find practical exercises in each folder according to the respective module, chapter, and lesson.

## Course Modules

Check some main topics presented in the PHP Course by module.

### Module 1: The Backend Tools and PHP Fundamentals

[Examples](./module1) | [Project](./module1/project/module1-project.md)

**PHP Syntax:** there are different websites where you can learn more about PHP syntax and how to improve your skill with it. Some of them - that were even used in the lessons - are the [PHP.net](https://www.php.net/manual/en/) and the [W3Schools](https://www.w3schools.com/php/).  

**Git:** this is a very important tool to learn and get more familiar with it. During the course, we learned the basics, but it is strongly recommended that you continue your studies in Git, you can even use the [Git Book](https://git-scm.com/book/en/v2) available.

**Terminal:** as we could see in the course, it is essential for a developer to know [how to use the terminal](https://developer.mozilla.org/en-US/docs/Learn/Tools_and_testing/Understanding_client-side_tools/Command_line), especially the UNIX commands. For a backend developer, it's even more important to know it.  

**Frontend:** Although your goal could be not to become a front-end developer, it is fundamental that all web developers understand how the client-side tools work and even know how to work with them when needed. The tools include [HTML](https://www.w3schools.com/html/), [CSS](https://www.w3schools.com/css), [JavaScript](https://www.w3schools.com/js), and the understanding of [SPA frameworks](https://en.wikipedia.org/wiki/Single-page_application).

### Module 2: Web Application and Database Basics

[Examples](./module2) | [Project](./module2/project/module2-project.md)

**The web ecosystem:** the studies of the web covers the server-side and client-side communication, the [HTTP protocol](https://developer.mozilla.org/en-US/docs/Web/HTTP/Overview), DNS, SSL, and other topics.  

**Teamwork:** to improve the way development teams deliver value to the business and work together in an organized development process, the agile methodologies will help. The ones we covered were [Scrum](https://www.scrum.org/learning-series/what-is-scrum) and [eXtreme Programming](http://www.extremeprogramming.org/).

**Relational Database:** to manage the application data in a way that we can easily manipulate the information using the power of SQL, relational databases are the best options. Some of them are [MySQL](https://www.mysqltutorial.org/), Postgres, Oracle, etc.  

**CRUDs:** an abbreviation for Create, Read, Update, and Delete, the creation of CRUD it's a good way to start learning how web applications work from its front-end, back-end, and database.

### Module 3: Object-Oriented Programming (OOP)

[Examples](./module3) | [Projects](./module3/README.md)

**Basic Concepts:** to start improving the PHP code, we use the [OOP paradigm](https://www.w3schools.com/php/php_oop_what_is.asp), such as classes, methods, attributes, composition, interfaces, etc.  

**PDO Extension:** in PHP, more specifically, we will have the [PHP Data Objects (PDO)](https://www.php.net/manual/en/book.pdo.php) to write the code responsible for handling the database using the OOP paradigm.  

**Model View Controller (MVC):** we can use the MVC architecture to support the separation of layers of the application.  

**Code Design:** as we write code for other people to read, it is essential to have a good design because it also - and most importantly - improves the maintainability of the software in the long term. To help with this, there are many principles we can find that will describe the way to name variables and classes to how the objects should behave. Some examples of these principles are SOLID, DRY, KISS, GRASP, Object Calisthenics, and others.

### Module 4: REST API and Frameworks

[Examples](./module4) | [Project](./module4/project/module4-project.md)

**Composer:** to handle the PHP package dependencies, we can use Composer. This tool will help with the installation, autoload, and tasks automation. Also, we can use [packagist.org](https://packagist.org/) to search for packages.  

**PSRs:** abbreviation for [PHP Standards Recommendations](https://www.php-fig.org/psr/), they will support the community's interoperability between packages and frameworks. It includes by providing interfaces, code styling, and others.

**REST API:** into the topic of web services, the [REST API](https://restfulapi.net/) is an architecture style to develop web APIs. By creating this type of application, different clients and devices can access the resources following the same principles.  

**Frameworks:** to improve the development productivity and reuse code already tested and validated by the community, we can use a framework that will provide several set up PHP components to develop web applications.

### Module 5: Managing PHP Applications

[Examples](./module5) | [Project](./module5/project/module5-project.md) | [Project Management API](https://github.com/jagaad/classroom-php-2209-001-api-project-management)

**Docker:** with the combination of Docker and Docker Compose, we can run PHP applications on different machines using the same environment that will be set in the containers. It avoids problems related to the tool versions. For PHP, we can use a platform such as [PHPDocker.io](https://phpdocker.io/) to generate the Docker files via a web user interface.

**Web Security:** it involves different topics. Some of them to take into consideration to mitigate issues are related to general development good practices. Such as keeping your version tools updated, continuously validating the client data ("never trust your client"), using the database tools to avoid SQL injection (prepare statement), using trusted packages, Web API authentication, and many others. We can learn more about security by following the [OWASP website](https://owasp.org/).

**ORM:** when using the OOP paradigm, we need to map the object to the database tables. To do it manually is not simple, so a tool we can use to make it easier is the Object Relational Mapper (ORM). In PHP, a popular package is the [Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/index.html).  

**Design Patterns:** in order to reuse documented solutions for known coding problems, we have the Design Patterns, which got popular with the famous "gang of four" book and has examples of [how to implement them using PHP](https://github.com/DesignPatternsPHP/DesignPatternsPHP).  

**Errors:** the application should inform the users and maintainers if something goes wrong, crashes, if any action should be taken, if it's healthy, etc. That's why the application must handle errors, exceptions, and logs well. In PHP, there are [several packages](https://packagist.org/?query=error%2Clog&tags=error~logging) to help with this, including working with external monitoring platforms.

**Debugging:** this is part of the development process for the developer to find a problem, fix it, and learn more about the code. In PHP, we can use [Xdebug](https://xdebug.org/) when we want to debug more efficiently.

### Module 6: Introduction to Symfony Framework

[Examples](./module6) | [Project](./module6/project/module6-project.md) | [Bookmarks API](https://github.com/jagaad/classroom-php-2209-001-api-bookmarks)

To conclude the course, we have learned about Symfony, one of the most popular PHP frameworks. It gives the developer many tools to make the work more productive and safer. Furthermore, once [it provides excellent documentation](https://symfony.com/doc/current/index.html), many components' configurations tested by the community come ready to use, including commands to generate code and manage the application.

## Next Steps

There are some recommendations for you to continue your coding studies related to the PHP ecosystem and software development in general.

Starting from PHP, some websites and people always share great content about the language to help you learn more about it and keep up to date. Some are [PHP The Right Way](https://phptherightway.com/), [Official PHP Website](https://www.php.net/), [PHP.Watch](https://php.watch/), [stitcher.io](https://stitcher.io/), and others. You can follow them via **Twitter**, **RSS Feed**, or subscribe to the **newsletter**.

Going to improving **algorithms** skills, there is the famous book **Cracking the Coding Interview**, published by Gayle Laakmann McDowell, that will guide you through the different coding topics, from algorithms to architectures. You can use the terms found in this book to learn more about each topic.

Other than that, it is also important to take a little time to continue practicing algorithms on platforms such as [LeetCode](https://leetcode.com/), [HackerRank](https://www.hackerrank.com/), etc.

Learning how to create good software is a continuous part of the software developer's job. To help with this, knowing what people have already passed and documented over the years is very important to consider. That's why the reading of books and authors such as **Clean Code** (by Robert C. Martin), **Refactoring** (by Martin Fowler), **Test Driven Development** (by Kent Beck), **Code Complete** (by McConnell), more specifically for PHP there are the [books published by Matthias Noback](https://matthiasnoback.nl/books/) and [many others](https://github.com/charlax/professional-programming).

Finally, check the [PHP studies guide on GitHub](https://github.com/odan/learn-php) and the [Backend Roadmap](https://roadmap.sh/backend) for a general idea of the path to track and to find recommendations to continue learning.  

It's only the beginning of the journey. **Let's keep going!** :rocket: :elephant:
