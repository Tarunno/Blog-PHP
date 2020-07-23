# Blog-PHP
I have used Procedural PHP for this project. I can create post, add image to the post, add topic tag. There's also have personal profile for every Author where everyone have personal profile picture, there previous post. 

![](ezgif.com-resize.gif)

The admin panel has 3 eidting option : users, posts and topic. The admin can remove a author and his/her posts, can add a Author also. Admin can publish or unpublish any post.
There's also a slide show, which consists of the trending posts. Admin can chose between posts and trending posts.

### Features : CURD and CMS
I have mainly useed the concept of CURD and CMS in procedural php.
features:
        1. add, delele update post, user and topic.
        2. upload post image and profile picture.
        3. rate, comoment in posts.
        4. search posts.
        5. admin panel for the admin to manage the contents.

              
### Languages : HTML CSS JavaScript PHP and SQL
I have used core HTML CSS JavaScript and PHP in this project. There's no framework used for any of these language.
For front-end I have used HTML CSS JS and for back-end I have used PHP SQL.
I have used XAMPP as local severe and phpMyadmin for Database managment system.

### Requirement : 
to run these project create :  
##### Database : blog 
##### Tables : 
              1.comments:
                id int(11) AUTO_INCREMENT PRIMARY KEY
                users_name varchar(256) NOT NULL
                comment_date datetime current_timestamp()	
                message	text NOT NULL
                post_id	int(128) NOT NULL
              
              2.posts:
              	id int(11) AUTO_INCREMENT	PRIMARY KEY	
                user_id	int(11) NOT NULL
                title	varchar(40)	NOT NULL
                image	varchar(256) NOT NULL
                body text NOT NULL
                published tinyint(4) NOT NULL		
                created_at datetime current_timestamp()
                topics	varchar(256) NOT NULL
                trending tinyint(11)	NOT NULL
                sum_rating bigint(11) NOT NULL	
                rated_users bigint(11) NOT NULL	
                
              3.topics:
                id int(11) AUTO_INCREMENT PRIMARY KEY
                title	varchar(30) NOT NULL
                description text 
                
              4.users:
                id int(11) AUTO_INCREMENT PRIMARY KEY
                admin tinyint(4) NOT NULL	
                username varchar(256) NOT NULL
                email Index varchar(256) NOT NULL
                password varchar(256) NOT NULL   (hashed)
                users_create_time timestamp current_timestamp()			
                profile_img_status varchar(256)
                            
