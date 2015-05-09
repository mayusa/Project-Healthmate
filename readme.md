## 'Health Mate' is May Liu's Capstone project that was built in April 2015.
[DEMO ADDRESS](http://52.8.0.219)   
A capstone is the culminating experience for students in the Master’s Degree in Computer Science. The capstone provides students with the opportunity to apply and integrate key concepts from each course in their program of study. Candidates must collaborate with their school community to identify an authentic and challenging technology-related need, problem, or research study to complete within the school, district or other educational agency. Working with faculty and relevant stakeholders, candidates must design, implement, and evaluate an appropriate solution to meet the need or problem.  

# Index  
1. [Project Objectives](#1-project-objectives)
2. [Project Features](#2-project-features)
3. [Project Environment](#3-project-environment)  
4. [Application Design](#4-application-design)  

## 1. Project Objectives

The purpose of “Health Mate” is to help people easily finding and understanding the information they need to know. So the objective is to build a `cross platform modern web application` that will provide resourceful and professional medical information. People can quickly and easily live with health at hand, with `very good user experience` .

## 2. Project Features
####2.1 User
Before login, user can get answers to medical questions, find & get information of care options, and after register and login, user can manage personal health information including reset the password. And user can view this web app by using any device.

####2.2 Editor
Editor can submit and manage all information of the “HealthMate” application (news, doctors’ information, facilities information, health hotline, conditions information).

####2.3 Administrator
Administrator can see all users’ list, check a particular user’s profile. And a super administrator can block any administrator, editor and user for security concerns.

## 3. Project Environment
####3.1 Back-End => Laravel5 (PHP):
Why Laravel? Well, technology moves pretty fast and it’s tough to keep up. Not only is it tough to keep up, but it is increasingly complex. Laravel strives to make moving forward with Web Development very simple. It is this unique combination of staying on the cutting edge of web based development with modern PHP, while also keeping things simple, that makes Laravel so attractive.

####3.2.a Front-End => AngularJS ( Front-End MVC Framework )  
AngularJS is a structural framework for dynamic web apps. It lets you use HTML as your template language and lets you extend HTML's syntax to express your application's components clearly and succinctly. Angular's data binding and dependency injection eliminate much of the code you would otherwise have to write. And it all happens within the browser, making it an ideal partner with any server technology.
####3.2.b Front-End => Bootstrap ( Responsive Web Design Framework )  
Bootstrap is an open source project originally created by Twitter to enable creation of responsive, mobile first web pages. Bootstrap has a standard set of classes that allow developers to quickly create applications that scale to devices of all sizes, and incorporate common components such as dialog boxes and validation. Bootstrap has become a standard for web design.
####3.3 Database => MySQL Community Server ( Open Source, free to use it )
MySQL is (as of July 2013) the world's second most[a] widely used relational database management system (RDBMS) and most widely used open-source RDBMS. It being used for many small and big businesses.
####3.4 Server => AWS EC2  
Amazon Elastic Compute Cloud (Amazon EC2) provides scalable computing capacity in the Amazon Web Services (AWS) cloud. Using Amazon EC2 eliminates your need to invest in hardware up front, so you can develop and deploy applications faster. You can use Amazon EC2 to launch as many or as few virtual servers as you need, configure security and networking, and manage storage. Amazon EC2 enables you to scale up or down to handle changes in requirements or spikes in popularity, reducing your need to forecast traffic.
####3.5 Local Develop/Test Server => Laravel Homestead  
Laravel Homestead is an official, pre-packaged Vagrant "box" that provides you a wonderful development environment without requiring you to install PHP, HHVM, a web server, and any other server software on your local machine. No more worrying about messing up your operating system! Vagrant boxes are completely disposable. If something goes wrong, you can destroy and re-create the box in minutes!
####3.6 Source Control: [github](https://github.com/mayusa/healthmate)

## 4. Application Design  
![Archiitecture](https://s-media-cache-ak0.pinimg.com/originals/77/71/bf/7771bf23c0afd626e8fa41374ab75434.jpg)    
![Use Cases](https://s-media-cache-ak0.pinimg.com/originals/03/6f/7f/036f7fc32d54a634b332a772d354466d.jpg)  
![ER Diagram](https://s-media-cache-ak0.pinimg.com/originals/e8/9c/ce/e89cceb4e95a0f4c1d0fd3c065aa40c6.jpg)  
![MVC Design](https://s-media-cache-ak0.pinimg.com/originals/00/a0/4e/00a04e4a03ba5115518fc414b38d7b30.jpg)  


