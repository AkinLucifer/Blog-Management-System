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


/*Making unique index to reduce the duplicate entry*/
create index index_name
    on project.registration (contact);

/*To Register The user*/
insert into project.registration(fname, lname, dob, contact, gender, username, password, user_type) VALUES();

/*To Check the User*/
select *from project.registration where username = 'susan' && password = '' ;

/*For displaying user */
select *from project.registration where user_type = 'user';

Delete from project.registration where username = 'prasad';

update  project.registration
set password = 'Awal'
where username = 'Prasad';

/*For the Content*/
create table project.blog
(
    post_id int auto_increment,
    post    varchar(255) not null,
    date varchar(50) not null,
    month varchar(50) not null,
    'like' int not null,
    constraint blog_pk
        primary key (post_id)
);

alter table project.blog
    add constraint blog_registration_username_fk
        foreign key (creator) references project.registration (username);

/*Record stores of blog action by which user*/
create table blog_action
(
    post_id int             null,
    actor   varchar(255)    null,
    `like`  enum ('0', '1') null,
    comment varchar(255)    null
);

alter table blog_action
    add constraint blog_action_registration_username_fk
        foreign key (actor) references project.registration (username);

alter table blog_action
    add constraint blog_action_blog_post_id_fk
        foreign key (post_id) references project.blog (post_id);

alter table blog_action
    modify `like` enum ('0', '1') default 0 ;


insert into project.blog_action(post_id, actor, `like`, comment) VALUES (6,'Rupesh','1','Hello');
