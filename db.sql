create or replace table posts
(
    id     int auto_increment
        primary key,
    title  varchar(256) not null,
    topic  varchar(256) not null,
    image  text         null,
    video  text         null,
    body   longtext     not null,
    author varchar(128) not null
);

create or replace table topic
(
    id   int auto_increment
        primary key,
    name varchar(128) null,
    body text         null
);

create or replace table users
(
    id         int auto_increment
        primary key,
    admin      tinyint                               null,
    username   varchar(255)                          not null,
    email      varchar(255)                          not null,
    password   varchar(255)                          not null,
    created_at timestamp default current_timestamp() not null,
    constraint email
        unique (email),
    constraint username
        unique (username)
)
    charset = utf8mb4;

