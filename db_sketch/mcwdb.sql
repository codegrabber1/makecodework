SET FOREIGN_KEY_CHECKS=0;
 -- drop tables themes, theme_categories, theme_posts, blog_categories, blog_posts, blog_post_comments, theme_posts_comments, about;
create database if not exists lartest CHAR SET utf8;
use lartest;

create table if not exists themes(
	id int auto_increment,
    theme_name varchar(60),
    primary key(id)
)engine=innodb;

create table if not exists theme_categories(
	id int auto_increment,
    theme_id int not null,
    slug varchar(100) unique,
    th_cat_name varchar(60) not null,
    th_cat_img varchar(60) not null,
    th_cat_title varchar(60) not null,
    primary key(id)
)engine=innodb;

create table if not exists theme_posts(
	id int auto_increment,
    theme_category_id int not null,
    slug varchar(100) unique,
    user_id int not null,
    p_title varchar (100) not null,
	p_keyword varchar(255),
    p_descr varchar(255),
	p_excerpt varchar (255) not null,
	p_text text not null,
	p_image varchar (100),
    is_published tinyint default 0,
    published_at timestamp,
    primary key(id)
)engine=innodb;

create table if not exists blog_categories(
	id int auto_increment,
    slug varchar(100) unique,
    bc_name varchar(60),
	primary key(id)
)engine=innodb;

create table if not exists blog_posts(
	id int auto_increment,
    blog_category_id int not null,
    user_id int not null,
    bc_title varchar(60),
    slug varchar(100) unique,
    bc_keyword varchar(255),
    bc_descr varchar(255),
    bc_excerpt varchar (255) not null,
	bc_text text not null,
	bc_image varchar (100),
    published_at tinyint default 0,
	primary key(id)
)engine=innodb;

create table if not exists blog_post_comments(
	id int auto_increment,
    blog_post_id int ,
    author_name varchar(60),
    author_email varchar(60) unique,
    comment_text text,
    moderated varchar (255) not null,
    published_at tinyint default 0,
	primary key(id)
)engine=innodb;

create table if not exists theme_posts_comments(
	id int auto_increment,
    theme_post_id int not null,
    author_name varchar(60),
    author_email varchar(60) unique,
    comment_text text,
    moderated varchar (255) not null,
    published_at tinyint default 0,
	primary key(id)
)engine=innodb;

create table if not exists about(
	id int auto_increment,
    my_name varchar(60),
    my_email varchar(60) unique,
    my_description text,
    primary key(id)
)engine=innodb;

create table if not exists settings(
	id int auto_increment,
    
    primary key(id)
)engine=innodb;

alter table theme_categories add foreign key (theme_id) references themes(id) on delete cascade;
alter table theme_posts add foreign key (theme_category_id) references theme_categories(id) on delete cascade;
alter table blog_posts add foreign key (blog_categorie_id) references blog_categories(id) on delete cascade;
alter table blog_post_comments add foreign key (blog_post_id) references blog_posts(id) on delete cascade;
alter table theme_posts_comments add foreign key (theme_post_id) references theme_posts(id) on delete cascade;