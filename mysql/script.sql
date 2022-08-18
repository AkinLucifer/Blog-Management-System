-- auto-generated definition
create table registration
(
    id        int auto_increment
        primary key,
    fname     varchar(50)             not null,
    lname     varchar(50)             not null,
    dob       date                    not null,
    contact   varchar(255)            not null,
    gender    enum ('Male', 'Female') not null,
    username  varchar(50)             not null,
    password  varchar(50)             not null,
    user_type enum ('user', 'admin')  null
);

create index index_name
    on registration (contact);
create table blog
(
    id      int          not null,
    post_id int auto_increment
        primary key,
    post    varchar(255) not null,
    date    varchar(255) not null,
    month   varchar(255) not null,
    `like`  int          not null,
    creator varchar(255) not null,
    constraint blog_registration_username_fk
        foreign key (id) references registration (id)
);

create table project.blog_action
(
    post_id  int             not null,
    actor_id int             not null,
    `like`   enum ('0', '1') null,
    actor    varchar(255)    not null,
    constraint blog_action_blog_post_id_fk
        foreign key (post_id) references project.blog (post_id),
    constraint blog_action_registration_username_fk
        foreign key (actor_id) references project.registration (id)
);

create table project.report
(
    post_id         int          not null,
    report_users    varchar(255) not null,
    report_users_id int          not null,
    reason          varchar(255) not null,
    constraint report_blog_post_id_fk
        foreign key (post_id) references project.blog (post_id),
    constraint report_registration_id_fk
        foreign key (report_users_id) references project.registration (id)
);

create table project.comment
(
    comment_id int auto_increment
        primary key,
    comment    varchar(255) not null,
    post_id    int          not null,
    actor_id   int          not null,
    constraint comment_blog_id_fk
        foreign key (post_id) references project.blog (id),
    constraint comment_registration_id_fk
        foreign key (actor_id) references project.registration (id)
);

create table project.reply
(
    report_id  int          not null
        primary key,
    reply      varchar(255) not null,
    comment_id int          not null,
    constraint reply_ibfk_1
        foreign key (comment_id) references project.comment (comment_id)
);

create index foreign_key_name
    on project.reply (comment_id);






/*For creating schema*/
create schema project;

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


insert into project.blog_action(post_id, actor, `like`, comment) VALUES (6,'Rupesh','1','Hello');

