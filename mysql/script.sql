/*For creating schema*/
create schema project;

/*To Create Table*/
create table project.registration (
                                      fname varchar(50) not null,
                                      lname varchar(50) not null,
                                      dob date not null,
                                      contact int not null,
                                      gender enum('male','female') not null,
                                      username varchar(50) primary key,
                                      password varchar(50) not null,
                                      user_type enum('user','admin')
);
alter table project.registration
    add `like` enum ('0', '1') default '0' not null;

alter table project.registration
    add dislike enum ('0', '1') default '0' not null;


/*Making unique index to reduce the duplicate entry*/
create index index_name
    on project.registration (contact);

/*To Register The user*/
insert into project.registration(fname, lname, dob, contact, gender, username, password, user_type) VALUES();

/*To Check the User*/
select *from project.registration where username = 'susan' && password = '' ;

/*For displaying user */
select *from project.registration where user_type = 'user';

/*For the Content*/
create table project.blog
(
    post_id int auto_increment,
    post    varchar(255) not null,
    `like` int not null,
    dislike int not null,
    comment varchar(255) not null,
    constraint blog_pk
        primary key (post_id)
);

alter table project.blog
alter column 'like' set default 0;

alter table project.blog
alter column dislike set default 0;

Delete from project.registration where username = 'prasad';
UPDATE project.registration SET `fname`='Susan' where lname='Awal';